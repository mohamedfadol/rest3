<?php

namespace App\Http\Controllers;

use App\Printer;
use App\Product;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PrinterController extends Controller
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
        $printers = Auth::user()->printers;
        //dd($printers);
        return view('printer.index')->withPrinters($printers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Auth::user()->branches;
        return view('printer.create')->with(['branches' => $branches]);
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
            'name'          => 'required|string|unique:printers',
            'enName'        => 'nullable|string',
            'printer'       => 'nullable',
            'printerName'   => 'nullable|string',
            'printerIndex'  => 'nullable',
            'copiesNumber'  => 'nullable',
            'note'          => 'nullable|string',
            'branch_id'     => 'required|uuid'
        ]);  

        // create instance for model 
        $printer = new Printer; 
        
        $printer->name         = $request->input('name');
        $printer->enName       = $request->input('enName');
        $printer->printer      = $request->input('printer');
        $printer->printerName  = $request->input('printerName');
        $printer->printerIndex = $request->input('printerIndex');
        $printer->copiesNumber = $request->input('copiesNumber');
        $printer->note         = $request->input('note');
        $printer->branch_id    = $request->input('branch_id');
        $printer->addByUserId  = Auth::user()->id;
        $printer->save();  

        return  redirect()->route('printer.index')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function show(Printer $printer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function edit(Printer $printer)
    {
        $printer = Printer::findOrFail($printer->id); 
        $branches = Auth::user()->branches;
        return view('printer.edit')->with(['printer' =>$printer , 'branches'=>$branches]);
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Printer $printer)
    {
            //dd($request->all()); 
        $this->validate($request,[
            'name'          => 'required|string',
            'enName'        => 'nullable|string',
            'printer'       => 'nullable',
            'printerName'   => 'nullable|string',
            'printerIndex'  => 'nullable',
            'copiesNumber'  => 'nullable',
            'note'          => 'nullable|string',
            'branch_id'     => 'required|uuid'
        ]);  

        $printer = Printer::findOrFail($printer->id); 
        
        $printer->name         = $request->input('name');
        $printer->enName       = $request->input('enName');
        $printer->printer      = $request->input('printer');
        $printer->printerName  = $request->input('printerName');
        $printer->printerIndex = $request->input('printerIndex');
        $printer->copiesNumber = $request->input('copiesNumber');
        $printer->note         = $request->input('note');
        $printer->branch_id    = $request->input('branch_id');
        $printer->addByUserId  = Auth::user()->id;
        $printer->save();  

        return  redirect()->route('printer.index')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Printer  $printer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Printer $printer)
    {
        $printer = Printer::findOrFail($printer->id); 
        $products = Product::where('printer_id' , '=' , $printer->id)->get();
            foreach ($products as $product) {
                //dd($product->printer_id);
            if($product->printer_id == $printer->id)
              return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
        }
        $printer->delete();
        return  redirect()->route('printer.index')->withSuccessMessage('Deleted Was Done');

    }
}
