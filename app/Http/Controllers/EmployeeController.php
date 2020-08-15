<?php

namespace App\Http\Controllers;

use App\Employee;
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


class EmployeeController extends Controller
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
    public function index()
    {
    //Get all users and pass it to the view
        $employees = Auth::user()->employees;

        return view('employees.index')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //Get all roles and pass it to the view
        $roles = Role::get();
        $branches = Auth::user()->branches;
        $floors =  Auth::user()->floors;
        return view('employees.create', ['roles'=>$roles, 'branches'=>$branches, 'floors'=>$floors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
    //Validate name, email and password fields
        $this->validate($request, [
            'firstName'     =>'required|max:255|unique:employees,firstName',
            'LastName'    =>'required',
            'binCode' =>'required|max:4|unique:employees,binCode',
            'branch_id'=>'required|uuid' ,
            'floor_id' =>'nullable|uuid'
        ]);

        $employee = new Employee();

            $employee->firstName   = $request->firstName;
            $employee->LastName    = $request->LastName;
            $employee->binCode     = $request->binCode;
            $employee->branch_id   = $request->branch_id;
            $employee->floor_id    = $request->floor_id == null ? 'null' : $request->input('floor_id');
            $employee->addByUserId = Auth::user()->id;
             //dd($employee);
            $employee->save();
         //Retrieving only the email and password data

        $roles = $request['roles']; //Retrieving the roles field
    //Checking if a role was selected
        if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();
            $employee->assignRole($role_r); //Assigning role to user
            }
        }
    //Redirect to the users.index view and display message
        return redirect()->route('employees.index')
            ->withSuccessMessage('User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return redirect('employees');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id); //Get user with specified id
        $roles = Role::get(); //Get all roles
        $branches = Auth::user()->branches;
        $floors =  Auth::user()->floors;
        return view('employees.edit', compact('employee', 'roles' ,'branches' ,'floors')); //pass user and roles data to view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee = Employee::findOrFail($employee->id); //Get role specified by id

    //Validate name, email and password fields
        $this->validate($request, [
            'firstName'      =>'required|max:255|unique:employees,firstName,'.$employee->id,
            'LastName'     =>'required',
            'binCode'   =>'required|max:4|unique:employees,binCode,'.$employee->id ,
            'branch_id' =>'required|uuid',
            'floor_id'  =>'nullable|uuid'
        ]);
        $input = $request->only(['firstName', 'LastName','branch_id','floor_id','binCode']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        //dd($user->fill($input));
        $employee->fill($input)->save();

        if (isset($roles)) {
            $employee->roles()->sync($roles);  //If one or more role is selected associate employee to roles
        }
        else {
            $employee->roles()->detach(); //If no role is selected remove exisiting role associated to a employee
        }
        return redirect()->route('employees.index')
            ->withSuccessMessage('User successfully edited.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
    //Find a user with a given id and delete
        $employee = Employee::findOrFail($employee->id);
            $branches = Branch::where('addByUserId' , $employee->id)->get();
            foreach ($branches as $branch) {
            if($branch->addByUserId == $employee->id)
              return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
            $Orders = Order::where('addByUserId' , '=' , $employee->id)->get();
            foreach ($Orders as $Order) {
            if($Order->addByUserId == $employee->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }

        $employee->delete();
        return redirect()->route('employees.index')
            ->withSuccessMessage('User successfully deleted.');
    }
}
