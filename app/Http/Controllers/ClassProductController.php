<?php

namespace App\Http\Controllers;

use App\ClassProduct;
use App\Product;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;

class ClassProductController extends Controller
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
        $classProducts = Auth::user()->classes;
        return view('class.index')->with(['classProducts' => $classProducts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('class.create');
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
            'nameAr' => 'required|string|unique:class_products',
            'nameEn' => 'required',
            'note'   => 'nullable|string'
        ]);  

        // create instance for model 
        $Class = new ClassProduct; 
        $Class->nameAr      = $request->input('nameAr');
        $Class->nameEn      = $request->input('nameEn');
        $Class->note        = $request->input('note');
        $Class->addByUserId = Auth::user()->id;
        $Class->save();

        return  redirect()->route('class.index')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassProduct  $classProduct
     * @return \Illuminate\Http\Response
     */
    public function show(ClassProduct $classProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassProduct  $classProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassProduct $class)
    {
        $classProduct = ClassProduct::find($class->id);
        return view('class.edit')->with(['classProduct' => $classProduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassProduct  $classProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassProduct $class)
    {
        $class = ClassProduct::find($class->id);
             //dd($request->all()); 
        $this->validate($request,[
            'nameAr' => 'required|string|unique:class_products,nameAr,'.$class->id,
            'nameEn' => 'required',
            'note'   => 'nullable|string'
        ]);   

        // create instance for model 

        $class->nameAr      = $request->input('nameAr');
        $class->nameEn      = $request->input('nameEn');
        $class->note        = $request->input('note');
        $class->addByUserId = Auth::user()->id;
        $class->save();

        return  redirect()->route('class.index')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassProduct  $classProduct
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassProduct $class)
    {
        $class = ClassProduct::findOrFail($class->id);

            $products = Product::where('class_id' , '=' , $class->id)->get();
            foreach ($products as $product) {
            if($product->class_id == $class->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
        $class->delete();
        return redirect()->route('class.index')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
