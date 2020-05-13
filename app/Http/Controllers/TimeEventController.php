<?php

namespace App\Http\Controllers;

use App\TimeEvent;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class TimeEventController extends Controller
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
        $timeEvent = Auth::user()->timeEvent;
        return view('timeEv.index')->with(['timeEvent' => $timeEvent]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Auth::user()->branches;
        $products = Auth::user()->products;
        $categories = Auth::user()->categories;
        return view('timeEv.create')
                ->with(['branches'=>$branches,'products'=>$products,'categories'=>$categories]); 
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
            'nameAr'      => 'required',
            'nameAE'      => 'nullable',
            'amount'      => 'required',
            'dateFrom'    => 'required',
            'dateTo'      => 'required',
            'product_id'  => 'required|uuid',
            'branch_id'   => 'required|uuid',
            'category_id' => 'required|uuid'
        ]);

        // create instance for model 
        $timeEvent = new TimeEvent;   
        
        $timeEvent->nameAr      =  $request->input('nameAr');
        $timeEvent->nameAE      =  $request->input('nameAE');
        $timeEvent->amount      =  $request->input('amount');
        $timeEvent->dateFrom    =  $request->input('dateFrom');
        $timeEvent->dateTo      =  $request->input('dateTo');
        $timeEvent->product_id  =  $request->input('product_id');
        $timeEvent->branch_id   =  $request->input('branch_id');
        $timeEvent->category_id =  $request->input('category_id');
        $timeEvent->addByUserId =  auth::user()->id;
        $timeEvent->save();

        return  redirect()->route('timeEvent.home')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeEvent  $timeEvent
     * @return \Illuminate\Http\Response
     */
    public function show(TimeEvent $timeEvent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeEvent  $timeEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeEvent $timeEvent)
    {
        $timeEvent =  TimeEvent::findOrFail($timeEvent->id);
        $products = Auth::user()->products;
        return view('timeEv.edit')->with(['timeEvent'=>$timeEvent , 'products'=>$products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeEvent  $timeEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeEvent $timeEvent)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'nameAr'      => 'required',
            'nameAE'      => 'nullable',
            'amount'      => 'required',
            'dateFrom'    => 'required',
            'dateTo'      => 'required',
            'product_id'  => 'required|uuid',
            'branch_id'   => 'required|uuid',
            'category_id' => 'required|uuid'
        ]);

        $timeEvent = TimeEvent::findOrFail($timeEvent->id);
        
        $timeEvent->nameAr      =  $request->input('nameAr');
        $timeEvent->nameAE      =  $request->input('nameAE');
        $timeEvent->amount      =  $request->input('amount');
        $timeEvent->dateFrom    =  $request->input('dateFrom');
        $timeEvent->dateTo      =  $request->input('dateTo');
        $timeEvent->product_id  =  $request->input('product_id');
        $timeEvent->branch_id   =  $request->input('branch_id');
        $timeEvent->category_id =  $request->input('category_id');
        $timeEvent->addByUserId =  auth::user()->id;
        $timeEvent->save();

        return  redirect()->route('timeEvent.home')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeEvent  $timeEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeEvent $timeEvent)
    {
        $timeEvent = TimeEvent::findOrFail($timeEvent->id);
        $timeEvent->delete();
        return  redirect()->route('timeEvent.home')->withSuccessMessage('Deleted Was Done'); 
    }
}
