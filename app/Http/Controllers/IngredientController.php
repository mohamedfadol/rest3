<?php

namespace App\Http\Controllers;

use App\Ingredient;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class IngredientController extends Controller
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
        $ingredients = Auth::user()->ingrediants;
        return view('ingredients.index')->with(['ingredients' => $ingredients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ingredients.create');
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
            'sku'     => 'nullable',
            'price'   => 'required',
            'note'    => 'nullable',
            'unit'    => 'nullable'
        ]);

        // create instance for model 
        $ingredient = new Ingredient;   
        $ingredient->nameAr      =  $request->input('nameAr');
        $ingredient->nameEn      =  $request->input('nameEn');
        $ingredient->sku = str_slug('3-'.$request->input('sku'));
        $ingredient->price       =  $request->input('price');
        $ingredient->note        =  $request->input('note');
        $ingredient->unit        =  $request->input('unit');
        $ingredient->addByUserId =  auth::user()->id;
        $ingredient->save();

        $Udatesku = Ingredient::findOrFail($ingredient->id);
        $ingredient->sku = str_slug('3-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $ingredient->update();

        return  redirect()->route('ingredient.index')->withSuccessMessage('success','Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function show(Ingredient $ingredient)
    {
        //return $ingredient =  Ingredient::findOrFail($ingredient->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function edit(Ingredient $ingredient)
    {
        $ingredient = Ingredient::findOrFail($ingredient->id);
        return view('ingredients.edit')->with(['ingredient' => $ingredient]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ingredient $ingredient)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'nameAr'  => 'required|string',
            'nameEn'  => 'nullable|string',
            'sku'     => 'required',
            'price'   => 'required',
            'note'    => 'nullable',
            'unit'    => 'nullable'
            
        ]);

        // create instance for model 
        $ingredient = Ingredient::findOrFail($ingredient->id);  
        
        $ingredient->nameAr      =  $request->input('nameAr');
        $ingredient->nameEn      =  $request->input('nameEn');
        $ingredient->sku = str_slug('3-'.$request->input('sku'));
        $ingredient->price       =  $request->input('price');
        $ingredient->note        =  $request->input('note');
        $ingredient->unit        =  $request->input('unit');
        $ingredient->addByUserId =  auth::user()->id;
        $ingredient->save();

        $Udatesku = Ingredient::findOrFail($ingredient->id);
        $ingredient->sku = str_slug('3-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $ingredient->update();
        
        return  redirect()->route('ingredient.index')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ingredient  $ingredient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ingredient $ingredient)
    {
        $ingredient =  Ingredient::findOrFail($ingredient->id);
        $ingredient->products()->detach();
        $ingredient->delete();
        return redirect()->route('ingredient.index')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
