<?php

namespace App\Http\Controllers;

use App\voidOrder;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class VoidOrderController extends Controller
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
        $voids = Auth::user()->voidOrder;
        return view('void.index')->with(['voids' => $voids]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Auth::user()->products;
        return view('void.create')->with(['products' => $products]); 
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
            'orderNumber' => 'required',
            'date'        => 'nullable',
            'price'       => 'required',
            'Qty'         => 'nullable',
            'note'        => 'nullable',
            'product_id'  => 'required|uuid'
        ]);

        // create instance for model 
        $voidOrder = new voidOrder;   
        
        $voidOrder->orderNumber =  $request->input('orderNumber');
        $voidOrder->date        =  $request->input('date');
        $voidOrder->price       =  $request->input('price');
        $voidOrder->Qty         =  $request->input('Qty');
        $voidOrder->note        =  $request->input('note');
        $voidOrder->product_id  =  $request->input('product_id');
        $voidOrder->addByUserId =  auth::user()->id;
        $voidOrder->save();

        return  redirect()->route('voidOrder.home')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\voidOrder  $voidOrder
     * @return \Illuminate\Http\Response
     */
    public function show(voidOrder $voidOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\voidOrder  $voidOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(voidOrder $voidOrder)
    {
        $voidOrder =  voidOrder::findOrFail($voidOrder->id);
        $products = Auth::user()->products;
        return view('void.edit')->with(['voidOrder'=>$voidOrder , 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\voidOrder  $voidOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, voidOrder $voidOrder)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'orderNumber' => 'required',
            'date'        => 'nullable',
            'price'       => 'required',
            'Qty'         => 'nullable',
            'note'        => 'nullable',
            'product_id'  => 'required|uuid'
        ]);
   
        $voidOrder =  voidOrder::findOrFail($voidOrder->id);   
    
        $voidOrder->orderNumber =  $request->input('orderNumber');
        $voidOrder->date        =  $request->input('date');
        $voidOrder->price       =  $request->input('price');
        $voidOrder->Qty         =  $request->input('Qty');
        $voidOrder->note        =  $request->input('note');
        $voidOrder->product_id  =  $request->input('product_id');
        $voidOrder->addByUserId =  auth::user()->id;
        $voidOrder->save();

        return  redirect()->route('voidOrder.home')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\voidOrder  $voidOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(voidOrder $voidOrder)
    {
        $voidOrder = voidOrder::findOrFail($voidOrder->id);
        $voidOrder->delete();
        return  redirect()->route('voidOrder.home')->withSuccessMessage('Deleted Was Done'); 
    }
}
