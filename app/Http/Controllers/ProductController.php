<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Ingredient;
use App\Modifire;
use App\Image;
use App\Discount;
use App\voidOrder;
use App\TimeEvent;
use App\Printer;
use App\ClassProduct;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
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
        $products = Auth::user()->products;
        return view('products.index')->with(['products' => $products]);
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('addByUserId'  , auth::user()->id)->get();
        $modifires = Modifire::where('addByUserId'  , auth::user()->id)->get();
        $ingredients = Ingredient::where('addByUserId'  , auth::user()->id)->get();
        $printers = Printer::where('addByUserId'  , auth::user()->id)->get();
        $classes = ClassProduct::where('addByUserId'  , auth::user()->id)->get();
           // dd($printers);
        return view('products.create')
                ->with([
                        'categories'  => $categories , 
                        'modifires'   => $modifires , 
                        'ingredients' => $ingredients, 
                        'classes' => $classes, 
                        'printers'   => $printers
                ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // dd($request->all()); 
        $this->validate($request,[
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nameAr'          => 'required|string',
            'descriptionAr'   => 'nullable|string',
            'nameEn'          => 'nullable|string',
            'descriptionEn'   => 'nullable|string',
            'sku'             => 'required',
            'category_id'     => 'required|uuid',
            'timedEventFrom'  => 'nullable|string',
            'timedEventTo'    => 'nullable|string',
            'price'           => 'nullable',
            'sellType'        => 'nullable',
            'tax'             => 'nullable',
            'active'          => 'nullable',
            'modifires'       => 'nullable',
            'printer_id'      => 'nullable',
            'ingredient_id'   => 'nullable',
            'class_id'        => 'nullable',
            'quantity'        => 'nullable' 
        ]);  

        // create instance for model 
        $product = new Product;  
        $product->nameAr           =  $request->input('nameAr');
        $product->descriptionAr    =  $request->input('descriptionAr');
        $product->nameEn           =  $request->input('nameEn');
        $product->descriptionEn    =  $request->input('descriptionEn');
        $product->sku = str_slug('2-'.$request->input('sku'));
        $product->category_id      =  $request->input('category_id');
        $product->printer_id       =  $request->input('printer_id');
        $product->class_id         =  $request->input('class_id');
        $product->timedEventFrom   =  $request->input('timedEventFrom');
        $product->timedEventTo     =  $request->input('timedEventTo');
        $product->price            = $request->price == null ? '0' : $request->input('price');

        $product->sellType         =  $request->input('sellType');
        $product->tax              =  $request->input('tax');
        $product->active           = $request->active == 'on' ? true : false;
        $product->addByUserId      = Auth::user()->id;
        $product->save(); 

        $Udatesku = Product::findOrFail($product->id);
        $product->sku = str_slug('1-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $product->update();

        if ($files = $request->hasFile('image')) {
           $fileNameWithEex = $request->file('image')->getClientOriginalName();
           $fileName = $request->file('image')->getRealPath();
           $image = file_get_contents($fileName);
           $fileNameToStoreBase64 = base64_encode($image);
           $categoryImage = new Image;
           $categoryImage->product_id  = $product->id; 
           $categoryImage->image      = $fileNameToStoreBase64;
           $categoryImage->save(); 


        }else{ 

            $fileNameToStoreBase64 = null ;
        }

          if (!empty($request->input('modifires')) ) {
                $product->modifires()->sync($request->input('modifires') , false);
          }else{ 

                $product->modifires()->sync(array()); 
          } 
            if(!empty($request->input('ingredient_id'))){
            foreach ($request->input('ingredient_id') as $i => $ingredient_id) {
                    $product->ingredients()
                    ->attach( $ingredient_id, 
                            [ 'quantity' => $request->input('quantity')[$i] ]
                            );
          }
      }

        return  redirect()->route('product.home')->withSuccessMessage('Inserted Was Done');

        // if (!empty($request->input('ingredient_id') && $request->input('quantity')) ) {
        //         $product->ingredients()->sync($request->input('ingredient_id') , false);
        //          $product->ingredients()->sync($request->input('quantity') , false);
        // }else{

        //         $product->ingredients()->sync(array()); 
        // }
        //dd($request->name);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product  = Product::findOrFail($product->id);
        $categories = Category::where('addByUserId'  , auth::user()->id)->get();
        $modifires = Modifire::where('addByUserId'  , auth::user()->id)->get();
        $ingredients = Ingredient::where('addByUserId'  , auth::user()->id)->get();
        $printers = Printer::where('addByUserId'  , auth::user()->id)->get();
        $classes = ClassProduct::where('addByUserId'  , auth::user()->id)->get();

        return view('products.edit')->with(
               ['categories'  => $categories , 
                'modifires'   => $modifires , 
                'ingredients' =>$ingredients,
                'product'     => $product,
                'classes'     => $classes,
                'printers'     => $printers
                ]);

    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
             //dd($request->all()); 
        $this->validate($request,[ 
            'image'           => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nameAr'          => 'required|string',
            'descriptionAr'   => 'nullable|string',
            'nameEn'          => 'nullable|string',
            'descriptionEn'   => 'nullable|string',
            'sku'             => 'required',
            'category_id'     => 'required|uuid',
            'timedEventFrom'  => 'nullable|date',
            'timedEventTo'    => 'nullable|date',
            'price'           => 'nullable',
            'sellType'        => 'nullable',
            'tax'             => 'nullable',
            'active'          => 'nullable',
            'modifires'       => 'nullable',
            'ingredient_id'   => 'nullable',
            'printer_id'      => 'nullable',
            'class_id'        => 'nullable',
            'quantity'        => 'nullable' 
        ]);  

        $product  = Product::findOrFail($product->id);  

        $product->nameAr           =  $request->input('nameAr');
        $product->descriptionAr    =  $request->input('descriptionAr');
        $product->nameEn           =  $request->input('nameEn');
        $product->descriptionEn    =  $request->input('descriptionEn');
        $product->sku = str_slug('2-'.$request->input('sku'));
        $product->category_id      =  $request->input('category_id');
        $product->printer_id       =  $request->input('printer_id');
        $product->class_id         =  $request->input('class_id');
        $product->timedEventFrom   =  $request->input('timedEventFrom');
        $product->timedEventTo     =  $request->input('timedEventTo');
        $product->price            = $request->price == null ? '0' : $request->input('price');

        $product->sellType         =  $request->input('sellType');
        $product->tax              =  $request->input('tax');
        $product->active           = $request->active == 'on' ? true : false;
        $product->addByUserId      = Auth::user()->id;
        $product->save(); 


        $Udatesku = Product::findOrFail($product->id);
        $product->sku = str_slug('1-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $product->update();
        
        if ($files = $request->hasFile('image')) {
           $fileNameWithEex = $request->file('image')->getClientOriginalName();
           $fileName = $request->file('image')->getRealPath();
           $image = file_get_contents($fileName);
           $fileNameToStoreBase64 = base64_encode($image);
           $categoryImage = new Image;
           $categoryImage->product_id  = $product->id; 
           $categoryImage->image       = $fileNameToStoreBase64;
           $categoryImage->save(); 


        }else{

            $fileNameToStoreBase64 = null ;
        }

          if (!empty($request->input('modifires')) ) {
                $product->modifires()->detach();
                $product->modifires()->sync($request->input('modifires') , false);
          }else{ 

                $product->modifires()->sync(array()); 
          } 
            if(!empty($request->input('ingredient_id'))){
                    $product->ingredients()->detach();
            foreach ($request->input('ingredient_id') as $i => $ingredient_id) {
                    $product->ingredients()
                    ->attach( $ingredient_id, 
                            [ 'quantity' => $request->input('quantity')[$i] ]
                            );
          }
      } 

        return  redirect()->route('product.home')->withSuccessMessage('Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product =  Product::findOrFail($product->id); 
            $discounts = Discount::where('product_id' , '=' , $product->id)->get();
            foreach ($discounts as $discount) {
                //dd($discount->product_id);
            if($discount->product_id == $product->id)
              return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
            $voidOrder = voidOrder::where('product_id' , '=' , $product->id)->get();
            foreach ($voidOrder as $void) {
                //dd($void->product_id);
            if($void->product_id == $product->id)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
            $TimeEvent = TimeEvent::where('product_id' , '=' , $product->id)->get();
            foreach ($TimeEvent as $Time) {
            if($Time->product_id == $product->id)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
            $images = Image::where('product_id' , '=' , $product->id)->get();
            foreach ($images as $image) {
                //dd($product->product_id);
            if($image->product_id == $product->id)
              $image->delete();
            }  
        $product->modifires()->detach();
        $product->ingredients()->detach();
        $product->delete();
        return redirect()->route('product.home')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
