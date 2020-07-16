<?php

namespace App\Http\Controllers;

use App\Branch;
use App\User;
use App\Table;
use App\TimeEvent;
use App\Order;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BranchController extends Controller
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
        // return $branches;
        //$branches = Branch::all();
        // this collection return only branch for authenticated owner 
        $branches = Auth::user()->branches;
        // return $branches;
        return view('branches.index')->with(['branches' => $branches]);
         
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {
        return view('branches.create');
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
        $this->validate($request,[
            'name'             => 'required|string|unique:branches',
            'delivery_price'   => 'required',
            'address_address'  => 'required|string',
            'monday_from'      => 'required|string',
            'monday_to'        => 'required|string',
            'tuesday_from'     => 'required|string',
            'tuesday_to'       => 'required|string',
            'wednesday_from'   => 'required|string',
            'wednesday_to'     => 'required|string',
            'thursday_from'    => 'required|string',
            'thursday_to'      => 'required|string',
            'friday_from'      => 'required|string',
            'friday_to'        => 'required|string',
            'saturday_from'    => 'required|string',
            'saturday_to'      => 'required|string',
            'sunday_from'      => 'required|string',
            'sunday_to'        => 'required|string',
            'tax'              => 'required|string',
            'phone'            => 'required|string'
        ]);  

        // create instance for model 
        $branch = new Branch; 
        
        $branch->name             = $request->input('name');
        $branch->slugable         = str_slug($request->input('name'), '-');
        $branch->delivery_price   = $request->input('delivery_price');
        $branch->address_address  = $request->input('address_address');
        $branch->monday_from      = $request->input('monday_from');
        $branch->monday_to        = $request->input('monday_to');
        $branch->tuesday_from     = $request->input('tuesday_from');
        $branch->tuesday_to       = $request->input('tuesday_to');
        $branch->wednesday_from   = $request->input('wednesday_from');
        $branch->wednesday_to     = $request->input('wednesday_to');
        $branch->thursday_from    = $request->input('thursday_from');
        $branch->thursday_to      = $request->input('thursday_to');
        $branch->friday_from      = $request->input('friday_from');
        $branch->friday_to        = $request->input('friday_to');
        $branch->saturday_from    = $request->input('saturday_from');
        $branch->saturday_to      = $request->input('saturday_to');
        $branch->sunday_from      = $request->input('sunday_from');
        $branch->sunday_to        = $request->input('sunday_to');
        $branch->tax              = $request->input('tax');
        $branch->phone            = $request->input('phone');
        $branch->addByUserId          = Auth::user()->id;
        //dd($request->name);
        $branch->save();

        return  redirect()->route('branch.index')->withSuccessMessage('Inserted Was Done');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $branch = Branch::find($branch->id);
        return view('branches.edit')->with(['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
             //dd($request->name);
        $this->validate($request,[
            'name' => 'required|string|unique:branches,name,'.$branch->id,
            'delivery_price'   => 'required',
            'address_address'  => 'required|string',
            'monday_from'      => 'required|string',
            'monday_to'        => 'required|string',
            'tuesday_from'     => 'required|string',
            'tuesday_to'       => 'required|string',
            'wednesday_from'   => 'required|string',
            'wednesday_to'     => 'required|string',
            'thursday_from'    => 'required|string',
            'thursday_to'      => 'required|string',
            'friday_from'      => 'required|string',
            'friday_to'        => 'required|string',
            'saturday_from'    => 'required|string',
            'saturday_to'      => 'required|string',
            'sunday_from'      => 'required|string',
            'sunday_to'        => 'required|string',
            'tax'              => 'required|string',
            'phone'            => 'required|string'
        ]); 

        $branch = Branch::findOrFail($branch->id);
        
        $branch->name             = $request->input('name');
        $branch->slugable         = str_slug($request->input('name'), '-');
        $branch->delivery_price   = $request->input('delivery_price');
        $branch->address_address  = $request->input('address_address');
        $branch->monday_from      = $request->input('monday_from');
        $branch->monday_to        = $request->input('monday_to');
        $branch->tuesday_from     = $request->input('tuesday_from');
        $branch->tuesday_to       = $request->input('tuesday_to');
        $branch->wednesday_from   = $request->input('wednesday_from');
        $branch->wednesday_to     = $request->input('wednesday_to');
        $branch->thursday_from    = $request->input('thursday_from');
        $branch->thursday_to      = $request->input('thursday_to');
        $branch->friday_from      = $request->input('friday_from');
        $branch->friday_to        = $request->input('friday_to');
        $branch->saturday_from    = $request->input('saturday_from');
        $branch->saturday_to      = $request->input('saturday_to');
        $branch->sunday_from      = $request->input('sunday_from');
        $branch->sunday_to        = $request->input('sunday_to');
        $branch->tax              = $request->input('tax');
        $branch->phone            = $request->input('phone');
        $branch->addByUserId          = Auth::user()->id;

        //dd($request->name);
        $branch->save();



        return  redirect()->route('branch.index')->withSuccessMessage('Update Was Done');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch = Branch::findOrFail($branch->id);

            $users = User::where('id' , $branch->addByUserId)->get();
            foreach ($users as $user) {
            if($user->id == $branch->addByUserId)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
            $tables = Table::where('branch_id' , '=' , $branch->id)->get();
            foreach ($tables as $table) {
            if($table->branch_id == $branch->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
            $TimeEvent = TimeEvent::where('branch_id' , '=' , $branch->id)->get();
            foreach ($TimeEvent as $Time) {
            if($Time->branch_id == $branch->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
            $Orders = Order::where('branch_id' , '=' , $branch->id)->get();
            foreach ($Orders as $Order) {
            if($Order->branch_id == $branch->id) 
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
        $branch->floors()->detach();
        $branch->delete();
        return redirect()->route('branch.index')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
