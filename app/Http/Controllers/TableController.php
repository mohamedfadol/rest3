<?php

namespace App\Http\Controllers;

use App\Table;
use App\Order;
use Illuminate\Http\Request;
use Auth; 
use RealRashid\SweetAlert\Facades\Alert;

class TableController extends Controller
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
        $tables = Auth::user()->tables;
        return view('tables.index')->with(['tables' => $tables]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floors = Auth::user()->floors;
        $branches = Auth::user()->branches;
        return view('tables.create')->with(['branches' =>$branches,'floors'=>$floors]);
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
            'name'            => 'required|string',
            'number'          => 'nullable|string',
            'chairsNumber'    => 'required|numeric',
            'maxChairsNumber' => 'nullable|string',
            'status'          => 'nullable|string',
            'floor_id'        => 'nullable|string',
            'branch_id'       => 'nullable|string'
        ]);

        // create instance for model 
        $table = new Table;   
        
        $table->name            =  $request->input('name');
        $table->number          =  $request->input('number');
        $table->chairsNumber    =  $request->input('chairsNumber');
        $table->maxChairsNumber =  $request->input('maxChairsNumber');
        $table->status          =  $request->input('status');
        $table->floor_id        =  $request->input('floor_id');
        $table->branch_id       =  $request->input('branch_id');
        $table->addByUserId     =  auth::user()->id;
        $table->save();

        return  redirect()->route('table.index')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        $table = Table::findOrFail($table->id);
        $floors = Auth::user()->floors;
        $branches = Auth::user()->branches;
        return view('tables.edit')
                ->with(['table' => $table,'branches' =>$branches,'floors'=>$floors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'name'            => 'required|string',
            'number'          => 'nullable|string',
            'chairsNumber'    => 'required|numeric',
            'maxChairsNumber' => 'nullable|string',
            'status'          => 'nullable|string',
            'floor_id'        => 'nullable|string',
            'branch_id'       => 'nullable|string'
        ]);

        $table = Table::findOrFail($table->id);
        
        $table->name            =  $request->input('name');
        $table->number          =  $request->input('number');
        $table->chairsNumber    =  $request->input('chairsNumber');
        $table->maxChairsNumber =  $request->input('maxChairsNumber');
        $table->status          =  $request->input('status');
        $table->floor_id        =  $request->input('floor_id');
        $table->branch_id       =  $request->input('branch_id');
        $table->addByUserId     =  auth::user()->id;
        $table->save();

        return  redirect()->route('table.index')->withSuccessMessage('Inserted Was Done');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table = Table::findOrFail($table->id); 
            $Orders = Order::where('table_id' , '=' , $table->id)->get();
            foreach ($Orders as $Order) {
                //dd($void->product_id);
            if($Order->table_id == $table->id)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
        $table->delete();
        return  redirect()->route('table.index')->withSuccessMessage('Deleted Was Done');
    }
}
