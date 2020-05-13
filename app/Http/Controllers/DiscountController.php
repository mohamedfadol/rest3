<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Product;
use auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DiscountController extends Controller
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
        $discounts = Discount::where('addByUserId', auth::user()->id)->get();
        return view('discounts.index')->with(['discounts' => $discounts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('addByUserId', auth::user()->id)->get();
        return view('discounts.create')->with(['products' => $products]);
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
            'name'       => 'required',
            'type'       => 'nullable',
            'amount'     => 'required',
            'product_id' => 'required|uuid'
        ]);

        $discount = new Discount;
        $discount->name        = $request->input('name');
        $discount->type        = $request->input('type');
        $discount->amount      = $request->input('amount');
        $discount->product_id  = $request->input('product_id');
        $discount->addByUserId = Auth::user()->id;
        $discount->save();   
        return redirect()->route('discount.home')->withSuccessMessage(['Inserted Has Been  Done']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        $discount  = Discount::findOrFail($discount->id);
        $products = Product::where('addByUserId', auth::user()->id)->get();
        return view('discounts.edit')->with(['products' => $products , 'discount' => $discount]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
            //dd($request->all()); 
        $this->validate($request,[
            'name'       => 'required',
            'type'       => 'nullable',
            'amount'     => 'required',
            'product_id' => 'required|uuid'
        ]);

        $discount  = Discount::findOrFail($discount->id);
        $discount->name        = $request->input('name');
        $discount->type        = $request->input('type');
        $discount->amount      = $request->input('amount');
        $discount->product_id  = $request->input('product_id');
        $discount->addByUserId = Auth::user()->id;
        $discount->save();   
        return redirect()->route('discount.home')->withSuccessMessage(['Updated Has Been  Done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount  = Discount::findOrFail($discount->id);
        $discount->delete();
        return redirect()->route('discount.home')->withSuccessMessage(['Deleted Has Been  Done']);

    }
}
