<?php

namespace App\Http\Controllers;

use App\giftCard;
use auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GiftCardController extends Controller
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
        $giftcards = giftCard::where('addByUserId' ,'=',auth::user()->id)->get();
        return view('giftcards.index')->with(['giftcards' => $giftcards]);

    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('giftcards.create');
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
            'name'         => 'required',
            'type'         => 'nullable',
            'amount'       => 'required',
            'ValidFrom'    => 'required',
            'validTo'      => 'required',
            'couponNumber' => 'required',
            'validOn'      => 'required',
        ]);

        $giftcard = new giftCard;
        $giftcard->name         = $request->input('name');
        $giftcard->type         = $request->input('type');
        $giftcard->amount       = $request->input('amount');
        $giftcard->ValidFrom    = $request->input('ValidFrom');
        $giftcard->validTo      = $request->input('validTo');
        $giftcard->couponNumber = $request->input('couponNumber');
        $giftcard->validOn      = $request->input('validOn');
        $giftcard->addByUserId  = Auth::user()->id;
        $giftcard->save();   
        return redirect()->route('giftcard.index')->withSuccessMessage(['Inserted Has Been  Done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\giftCard  $giftCard
     * @return \Illuminate\Http\Response
     */
    public function show(giftCard $giftCard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\giftCard  $giftCard
     * @return \Illuminate\Http\Response
     */
    public function edit(giftCard $giftCard)
    {
        $giftcard  = giftCard::findOrFail($giftCard->id);
        return view('giftcards.edit')->with(['giftcard' => $giftcard]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\giftCard  $giftCard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, giftCard $giftCard)
    {
            //dd($request->all()); 
        $this->validate($request,[
            'name'         => 'required',
            'type'         => 'nullable',
            'amount'       => 'required',
            'ValidFrom'    => 'required',
            'validTo'      => 'required',
            'couponNumber' => 'required',
            'validOn'      => 'required',
        ]);

        $giftcard  = giftCard::findOrFail($giftCard->id);
        $giftcard->name         = $request->input('name');
        $giftcard->type         = $request->input('type');
        $giftcard->amount       = $request->input('amount');
        $giftcard->ValidFrom    = $request->input('ValidFrom');
        $giftcard->validTo      = $request->input('validTo');
        $giftcard->couponNumber = $request->input('couponNumber');
        $giftcard->validOn      = $request->input('validOn');
        $giftcard->addByUserId  = Auth::user()->id;
        $giftcard->save();   
        return redirect()->route('giftcard.index')->withSuccessMessage(['Updated Has Been  Done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\giftCard  $giftCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(giftCard $giftCard)
    {
        $giftcard  = giftCard::findOrFail($giftCard->id);
        $giftcard->delete();
        return redirect()->route('giftcard.index')->withSuccessMessage(['Deleted Has Been  Done']);

    }
}
