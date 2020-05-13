<?php

namespace App\Http\Controllers;

use App\User;
use App\Floor;
use App\Branch;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;
 

//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use RealRashid\SweetAlert\Facades\Alert;

//Enables us to output flash messaging
use Session;
  
class UserController extends Controller  
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request , $next){ 

            if (session('success_message')) {
                Alert::success('Success !!' , session('success_message'));
            }elseif (session('warning_message')) {

                alert()->warning('WarningAlert !!',session('warning_message'));                
            }

             return $next($request);
        });

    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response 
    */
    public function index() { 
    //Get all users and pass it to the view
        $users = Auth::user()->employees; 
        return view('users.index')->with('users', $users);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create() {
    //Get all roles and pass it to the view
        $roles = Role::get();
        $branches = Auth::user()->branches;
        $floors = Floor::where('addByUserId' , Auth::user()->id)->get();
        return view('users.create', ['roles'=>$roles, 'branches'=>$branches, 'floors'=>$floors]);
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request) { 
    //Validate name, email and password fields
        $this->validate($request, [ 
            'firstName'     =>'required|max:255|unique:users,firstName',
            'LastName'    =>'required',
            'binCode' =>'required|max:4|unique:users,binCode',
            'branch_id'=>'required|uuid' ,
            'floor_id' =>'nullable' 
        ]);

        $user = new User();

            $user->firstName        = $request->firstName;
            $user->LastName       = $request->LastName;
            $user->branch_id   = $request->branch_id;
            $user->floor_id    = $request->floor_id == null ? 'null' : $request->input('floor_id');
            $user->binCode     = Hash::make($request->binCode);
            $user->addByUserId = Auth::user()->id;
            $user->save(); 
         //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();            
            $user->assignRole($role_r); //Assigning role to user
            }
        }        
    //Redirect to the users.index view and display message
        return redirect()->route('users.index')
            ->withSuccessMessage('User successfully added.');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id) {
        return redirect('users'); 
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $user = User::findOrFail($id); //Get user with specified id
        $roles = Role::get(); //Get all roles
        $branches = Auth::user()->branches;
        $floors = Floor::where('addByUserId' , Auth::user()->id)->get();
        return view('users.edit', compact('user', 'roles' ,'branches' ,'floors')); //pass user and roles data to view

    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id) {
        $user = User::findOrFail($id); //Get role specified by id
        
    //Validate name, email and password fields    
        $this->validate($request, [
            'firstName'      =>'required|max:255|unique:users,firstName,'.$id,
            'LastName'     =>'required',
            'binCode'   =>'required|max:4|unique:users,binCode,'.$id ,
            'branch_id' =>'required|uuid',
            'floor_id'  =>'nullable'
        ]);
        $input = $request->only(['firstName', 'LastName','branch_id','floor_id','binCode']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        //dd($user->fill($input));
        $user->fill($input)->save();

        if (isset($roles)) {        
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles          
        }        
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect()->route('users.index')
            ->withSuccessMessage('User successfully edited.');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id) {
    //Find a user with a given id and delete
        $user = User::findOrFail($id); 
            $branches = Branch::where('addByUserId' , $user->id)->get();
            foreach ($branches as $branch) {
            if($branch->addByUserId == $user->id)
              return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
            $Orders = Order::where('addByUserId' , '=' , $user->id)->get();
            foreach ($Orders as $Order) {
            if($Order->addByUserId == $user->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }

        $user->delete();
        return redirect()->route('users.index')  
            ->withSuccessMessage('User successfully deleted.');
    }
}
