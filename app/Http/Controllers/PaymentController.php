<?php

namespace App\Http\Controllers;

use App\Payment;
use App\Order;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class PaymentController extends Controller
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
        $payments = Payment::where('addByUserId' , Auth::user()->id)->get();
        //dd($payments);
        return view('payment.index')->withPayments($payments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create');
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
            'name'   => 'required|string|unique:payments',
            'nameEn' => 'nullable|string', 
            'value'  => 'nullable',
            'type'   => 'nullable',
            'default'=> 'nullable',
            'note'   => 'nullable|string'
        ]);   

        // create instance for model 
        $payment = new Payment; 
        $payment->name         = $request->input('name');
        $payment->nameEn       = $request->input('nameEn');
        $payment->value        = $request->value   == null ? 0 : 1;
        $payment->type         = $request->type    == null ? 0 : 1;
        $payment->default      = $request->default == null ? 0 : 1;
        $payment->note         = $request->input('note');
        $payment->addByUserId  = Auth::user()->id;
        $payment->save();  

        return  redirect()->route('payment.index')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $payment = Payment::findOrFail($payment->id);
        return view('payment.edit')->with(['payment' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
            //dd($request->all()); 
        $this->validate($request,[
            'name'   => 'required|string',
            'nameEn' => 'nullable|string',
            'value'  => 'nullable',
            'type'   => 'nullable',
            'default'=> 'nullable',
            'note'   => 'nullable|string'
        ]);  

        // create instance for model 
        $payment = Payment::findOrFail($payment->id);

        $payment->name         = $request->input('name');
        $payment->nameEn       = $request->input('nameEn');
        $payment->value        = $request->value   == null ? 0 : 1;
        $payment->type         = $request->type    == null ? 0 : 1;
        $payment->default      = $request->default == null ? 0 : 1;
        $payment->note         = $request->input('note');
        $payment->addByUserId  = Auth::user()->id;
        $payment->save();  

        return  redirect()->route('payment.index')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment = Payment::findOrFail($payment->id);

        $Orders = Order::where('paymentType' , '=' , $payment->id)->get();
            foreach ($Orders as $Order) {
            if($Order->paymentType == $payment->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
        }

        $payment->delete();
        return  redirect()->route('payment.index')->withSuccessMessage('Deleted Was Done');

    }
}
