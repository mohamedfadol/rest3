<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
class CustomerController extends Controller
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
        $customers = Customer::all();
        return view('customers.index')->with(['customers' => $customers]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create'); 
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
            'name'        => 'required',
            'nationality' => 'nullable',
            'email'       => 'required',
            'phone'       => 'required',
            'country'     => 'required',
            'state'       => 'required',
            'city'        => 'required',
            'area'        => 'required',
            'street'      => 'required',
            'creditCard'  => 'required',
            'note'        => 'required'
        ]);

        $customer = new Customer;
        $customer->name        = $request->input('name');
        $customer->nationality = $request->input('nationality');
        $customer->email       = $request->input('email');
        $customer->phone       = $request->input('phone');
        $customer->country     = $request->input('country');
        $customer->state       = $request->input('state');
        $customer->city        = $request->input('city');
        $customer->area        = $request->input('area');
        $customer->street      = $request->input('street');
        $customer->creditCard  = $request->input('creditCard');
        $customer->note        = $request->input('note');
        $customer->addByUserId = Auth::user()->id;
        $customer->save();   
        return redirect()->route('customer.home')->withSuccessMessage(['Inserted Has Been  Done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id);
        return view('customers.edit')->with(['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //dd($request->all()); 
        $this->validate($request,[
            'name'        => 'required',
            'nationality' => 'nullable',
            'email'       => 'required',
            'phone'       => 'required',
            'country'     => 'required',
            'state'       => 'required',
            'city'        => 'required',
            'area'        => 'required',
            'street'      => 'required',
            'creditCard'  => 'required',
            'note'        => 'required'
        ]);

        $customer = Customer::findOrFail($customer->id);
        $customer->name        = $request->input('name');
        $customer->nationality = $request->input('nationality');
        $customer->email       = $request->input('email');
        $customer->phone       = $request->input('phone');
        $customer->country     = $request->input('country');
        $customer->state       = $request->input('state');
        $customer->city        = $request->input('city');
        $customer->area        = $request->input('area');
        $customer->street      = $request->input('street');
        $customer->creditCard  = $request->input('creditCard');
        $customer->note        = $request->input('note');
        $customer->addByUserId = Auth::user()->id;
        $customer->save();   
        return redirect()->route('customer.home')->withSuccessMessage(['Inserted Has Been  Done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer = Customer::findOrFail($customer->id); 
            $Orders = Order::where('customer_id' , '=' , $customer->id)->get();
            foreach ($Orders as $Order) {
                //dd($void->product_id);
            if($Order->customer_id == $customer->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
        $customer->delete();
        return  redirect()->route('customer.home')->withSuccessMessage('Deleted Was Done');
    
    }


}
