<?php

namespace App\Http\Controllers;

use App\Trans;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransController extends Controller
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
        $trans = Auth::user()->trans;
        return view('trans.index')->with(['trans' => $trans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trans.create');
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
            'name'   => 'required|string|unique:printers',
            'date'   => 'nullable|string',
            'debit'  => 'required',
            'credit' => 'required|string',
            'notes'  => 'required',
        ]);  

        // create instance for model 
        $trans = new Trans; 
        
        $trans->name         = $request->input('name');
        $trans->date         = $request->input('date');
        $trans->debit        = $request->input('debit');
        $trans->credit       = $request->input('credit');
        $trans->notes        = $request->input('notes');
        $trans->addByUserId  = Auth::user()->id;
        $trans->save();  

        return  redirect()->route('trans.home')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function show(Trans $trans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function edit(Trans $trans)
    {
        $trans = Trans::findOrFail($trans->id); 
        return view('trans.edit')->with(['trans' =>$trans]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trans $trans)
    {
            //dd($request->all()); 
        $this->validate($request,[
            'name'   => 'required|string|unique:printers,name,'.$trans->id,
            'date'   => 'nullable|string',
            'debit'  => 'required',
            'credit' => 'required|string',
            'notes'  => 'required',
        ]);  

        $trans = Trans::findOrFail($trans->id); 
        $trans->name         = $request->input('name');
        $trans->date         = $request->input('date');
        $trans->debit        = $request->input('debit');
        $trans->credit       = $request->input('credit');
        $trans->notes        = $request->input('notes');
        $trans->addByUserId  = Auth::user()->id;
        $trans->save();  

        return  redirect()->route('trans.home')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trans $trans)
    {
        $trans = Trans::findOrFail($trans->id); 
        $trans->delete();
        return  redirect()->route('trans.home')->withSuccessMessage('Deleted Was Done');

    }


}
