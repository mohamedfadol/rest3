<?php

namespace App\Http\Controllers;

use App\TableReserve;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TableReserveController extends Controller
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
        $tableRese = Auth::user()->tableReserve;
        return view('tableReserve.index')->with(['tableRese' => $tableRese]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floors = Auth::user()->floors;
        return view('tableReserve.create')->with(['floors'=>$floors]);
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
            'customerPhone'   => 'required',
            'dateFrom'        => 'nullable',
            'dateTo'          => 'required',
            'payment'         => 'nullable',
            'paymentMinorder' => 'nullable',
            'minorderValue'   => 'nullable',
            'enterFee'        => 'required',
            'note'            => 'nullable|string',
            'startDate'       => 'required',
            'total'           => 'required',
            'floor_id'        => 'required|uuid',
        ]);

        // create instance for model 
        $tableReserve = new TableReserve;   
        
        $tableReserve->customerPhone   =  $request->input('customerPhone');
        $tableReserve->dateFrom        =  $request->input('dateFrom');
        $tableReserve->dateTo          =  $request->input('dateTo');
        $tableReserve->payment         =  $request->input('payment');
        $tableReserve->paymentMinorder =  $request->input('paymentMinorder');
        $tableReserve->minorderValue   =  $request->input('minorderValue');
        $tableReserve->enterFee        =  $request->input('enterFee');
        $tableReserve->note            =  $request->input('note');
        $tableReserve->startDate       =  $request->input('startDate');
        $tableReserve->total           =  $request->input('total');
        $tableReserve->floor_id        =  $request->input('floor_id');
        $tableReserve->addByUserId     =  auth::user()->id;
        $tableReserve->save();

        return  redirect()->route('tableReser.home')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TableReserve  $tableReserve
     * @return \Illuminate\Http\Response
     */
    public function show(TableReserve $tableReserve)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TableReserve  $tableReserve
     * @return \Illuminate\Http\Response
     */
    public function edit(TableReserve $tableReserve)
    {
        $tableReserve = TableReserve::findOrFail($tableReserve->id);
        $floors = Auth::user()->floors;
        return view('tableReserve.edit')
                ->with(['TableReserve' => $TableReserve,'floors' => $floors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TableReserve  $tableReserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TableReserve $tableReserve)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'customerPhone'   => 'required',
            'dateFrom'        => 'nullable',
            'dateTo'          => 'required',
            'payment'         => 'nullable',
            'paymentMinorder' => 'nullable',
            'minorderValue'   => 'nullable',
            'enterFee'        => 'required',
            'note'            => 'nullable|string',
            'startDate'       => 'required',
            'total'           => 'required',
            'floor_id'        => 'required|uuid',
        ]);
        
        $tableReserve = TableReserve::findOrFail($tableReserve->id);   
        
        $tableReserve->customerPhone   =  $request->input('customerPhone');
        $tableReserve->dateFrom        =  $request->input('dateFrom');
        $tableReserve->dateTo          =  $request->input('dateTo');
        $tableReserve->payment         =  $request->input('payment');
        $tableReserve->paymentMinorder =  $request->input('paymentMinorder');
        $tableReserve->minorderValue   =  $request->input('minorderValue');
        $tableReserve->enterFee        =  $request->input('enterFee');
        $tableReserve->note            =  $request->input('note');
        $tableReserve->startDate       =  $request->input('startDate');
        $tableReserve->total           =  $request->input('total');
        $tableReserve->floor_id        =  $request->input('floor_id');
        $tableReserve->addByUserId     =  auth::user()->id;
        $tableReserve->save();

        return  redirect()->route('tableReser.home')->withSuccessMessage('Inserted Was Done');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TableReserve  $tableReserve
     * @return \Illuminate\Http\Response
     */
    public function destroy(TableReserve $tableReserve)
    {
        $tableReserve = TableReserve::findOrFail($TableReserve->id);
        $tableReserve->delete();
        return  redirect()->route('tableReser.home')->withSuccessMessage('Deleted Was Done');
    }
}
