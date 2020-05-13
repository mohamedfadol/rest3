<?php

namespace App\Http\Controllers;

use App\BillKind;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class BillKindController extends Controller
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
        $billKinds = Auth::user()->billKind;
        return view('billKind.index')->with(['billKinds' => $billKinds]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('billKind.create');
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
            'BillKindNumber'      => 'required|string',
            'BillKindName'        => 'nullable|string',
            'BillKindNameEnglish' => 'nullable|string'
        ]);

        // create instance for model 
        $billKind = new BillKind;   
        
        $billKind->BillKindNumber      =  $request->input('BillKindNumber');
        $billKind->BillKindName        =  $request->input('BillKindName');
        $billKind->BillKindNameEnglish =  $request->input('BillKindNameEnglish');
        $billKind->addByUserId         =  Auth::user()->id;
        $billKind->save();

        return  redirect()->route('billKind.home')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BillKind  $billKind
     * @return \Illuminate\Http\Response
     */
    public function show(BillKind $billKind)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BillKind  $billKind
     * @return \Illuminate\Http\Response
     */
    public function edit(BillKind $billKind)
    {
        $billKind = BillKind::findOrFail($billKind->id);
        return view('billKind.edit')->with(['billKind' => $billKind]);
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BillKind  $billKind
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BillKind $billKind)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'BillKindNumber'      => 'required|string',
            'BillKindName'        => 'nullable|string',
            'BillKindNameEnglish' => 'nullable|string'
        ]);
 
        $billKind = BillKind::findOrFail($billKind->id); 
        
        $billKind->BillKindNumber      =  $request->input('BillKindNumber');
        $billKind->BillKindName        =  $request->input('BillKindName');
        $billKind->BillKindNameEnglish =  $request->input('BillKindNameEnglish');
        // $BillKind->addByUserId         =  Auth::user()->id;
        $billKind->save();

        return  redirect()->route('billKind.home')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BillKind  $billKind
     * @return \Illuminate\Http\Response
     */
    public function destroy(BillKind $billKind) 
    {
        $billKind = BillKind::findOrFail($billKind->id); 
            $orders = Order::where('bill_id' , '=' , $billKind->id)->get();
            foreach ($orders as $order) {
                if($order->bill_id == $billKind->id)
                    return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
                }
        $billKind->delete();
        return redirect()->route('billKind.home')->withSuccessMessage(['Deleted Has Been  Done']);

    }
}
