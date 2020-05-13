<?php

namespace App\Http\Controllers;

use App\Modifire;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ModifireController extends Controller
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
        $modifires = Auth::user()->modifires;
        return view('modifires.index')->with(['modifires' => $modifires]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modifires.create');
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
            'nameAr'  => 'required|string',
            'nameEn'  => 'nullable|string',
            'sku'     => 'required',
            'cost'    => 'nullable|numeric',
            'tax'     => 'nullable|string',
            'price'   => 'nullable|string',
            'unit'    => 'nullable|string' 
        ]);

        // create instance for model 
        $modifire = new Modifire;   

        $modifire->nameAr  =  $request->input('nameAr');
        $modifire->nameEn  =  $request->input('nameEn');
        $modifire->sku     = str_slug('4-'.$request->input('sku'));
        $modifire->cost    =  $request->input('cost');
        $modifire->tax     =  $request->input('tax');
        $modifire->price   =  $request->input('price');
        $modifire->unit    =  $request->input('unit');
        $modifire->addByUserId =  auth::user()->id;
        $modifire->save();

        $Udatesku = Modifire::findOrFail($modifire->id);
        $modifire->sku = str_slug('4-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $modifire->update();

        return  redirect()->route('modifire.home')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modifire  $modifire
     * @return \Illuminate\Http\Response
     */
    public function show(Modifire $modifire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modifire  $modifire
     * @return \Illuminate\Http\Response
     */
    public function edit(Modifire $modifire)
    {
        $modifire = Modifire::findOrFail($modifire->id);
        return view('modifires.edit')->with(['modifire' => $modifire]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modifire  $modifire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modifire $modifire)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'nameAr'  => 'required|string',
            'nameEn'  => 'nullable|string',
            'sku'     => 'required',
            'cost'    => 'nullable|numeric',
            'tax'     => 'nullable|string',
            'price'   => 'nullable|string',
            'unit'    => 'nullable|string' 
        ]);

        // create instance for model 
        $modifire =  Modifire::findOrFail($modifire->id);   
        
        $modifire->nameAr  =  $request->input('nameAr');
        $modifire->nameEn  =  $request->input('nameEn');
        $modifire->sku     = str_slug('4-'.$request->input('sku'));
        $modifire->cost    =  $request->input('cost');
        $modifire->tax     =  $request->input('tax');
        $modifire->price   =  $request->input('price');
        $modifire->unit    =  $request->input('unit');
        $modifire->addByUserId =  auth::user()->id;
        $modifire->save();

        $Udatesku = Modifire::findOrFail($modifire->id);
        $modifire->sku = str_slug('4-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $modifire->update();

        return  redirect()->route('modifire.home')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modifire  $modifire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modifire $modifire) 
    {
        $modifire =  Modifire::findOrFail($modifire->id);
        $modifire->products()->detach();
        $modifire->delete();
        return redirect()->route('modifire.home')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
