<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Menu;
use App\TimeEvent;
use App\Image;
use Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
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
        //$categories = Category::all();
        $categories =  Auth::user()->categories;
        $branches = Auth::user()->branches;
        $branchName = $branches->first();
        $branchname =$branchName->slugable; 
        return view('categories.index')->with(['categories'=>$categories,'branchname'=>$branchname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Auth::user()->categories;
        return view('categories.create', compact('categories'));
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
            'image'            => 'required|image',
            'name'             => 'required|string|unique:categories',
            'sku'              => 'required',
            'timedEventFrom'   => 'nullable|date',
            'timedEventTo'     => 'nullable|date',
            'cat_id'           => 'nullable'
        ]);  
 
        if ($request->hasFile('image')) {
            // Get File Name With Extenison
            $fileNameWithEex = $request->file('image')->getClientOriginalName();
            // Get fileName Only
            $fileName = pathinfo($fileNameWithEex , PATHINFO_FILENAME);
            // Get FileExtenison
            $extension = $request->file('image')->getClientOriginalExtension();
            // fileName To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image 
            $branches = Auth::user()->branches;
            $branchName = $branches->first();
            //dd($branchName->name);
            $branchName =$branchName->slugable;
            $folder = 'public/'.$branchName.'/category';
            $path = $request->file('image')->storeAs($folder, $fileNameToStore);
            // dd($path);
        }else{
            $fileNameToStore = 'No Images To Store In .jpg';
        }

        $category = new Category;
        $category->name = $request->input('name');
        $category->image   = $fileNameToStore;
        $category->sku = str_slug('1-'.$request->input('sku'));
        $category->timedEventFrom = $request->input('timedEventFrom');
        $category->timedEventTo   = $request->input('timedEventTo');
        if ($request->input('cat_id') == '') {
            $category->cat_id = '';
        }else{
        $category->cat_id         = $request->input('cat_id');
        }
        $category->active         = $request->active == 'on' ? true : false;
        $category->addByUserId    = Auth::user()->id;
        $category->save();

        $Udatesku = Category::findOrFail($category->id);
        $category->sku = str_slug('1-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $category->update();

       // if ($files = $request->hasFile('image')) {
       //     $fileNameWithEex = $request->file('image')->getClientOriginalName();
       //     $fileName = $request->file('image')->getRealPath();
       //     $image = file_get_contents($fileName);
       //     $fileNameToStoreBase64 = base64_encode($image);
       //     $categoryImage = new Image;
       //     $categoryImage->category_id  = $category->id; 
       //     $categoryImage->image = $fileNameToStoreBase64;
       //     $categoryImage->save(); 
       //  }else{$fileNameToStoreBase64 = null ;}
        return redirect()->route('category.index')->withSuccessMessage(['Inserted Has Been  Done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category =  Category::findOrFail($category->id);
        $categories =  Category::all();
        return  view('categories.edit')
                ->with(['categories'=> $categories ,'category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
            //dd($request->all()); 
        $this->validate($request,[ 
            'image'            => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name'             => 'required|string|unique:categories,name,'.$category->id,
            'sku'              => 'required',
            'timedEventFrom'   => 'nullable|date',
            'timedEventTo'     => 'nullable|date',
            'cat_id'           => 'nullable'
        ]);  

        if ($request->hasFile('image')) {
            // Get File Name With Extenison
            $fileNameWithEex = $request->file('image')->getClientOriginalName();
            // Get fileName Only
            $fileName = pathinfo($fileNameWithEex , PATHINFO_FILENAME);
            // Get FileExtenison
            $extension = $request->file('image')->getClientOriginalExtension();
            // fileName To Store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            // Upload Image
            $branches = Auth::user()->branches;
            $branchName = $branches->first();
            //dd($branchName->name);
            $branchName =$branchName->slugable;
            $folder = 'public/'.$branchName.'/category';
            $path = $request->file('image')->storeAs($folder, $fileNameToStore);
            // dd($path);
        }else{
            $fileNameToStore = 'No Images To Store In .jpg';
        } 
        $category =  Category::findOrFail($category->id); 
        $category->name           = $request->input('name');
        $category->image   = $fileNameToStore;
        $category->sku = str_slug('1-'.$request->input('sku'));
        $category->timedEventFrom = $request->input('timedEventFrom');
        $category->timedEventTo   = $request->input('timedEventTo');
        if ($request->input('cat_id') == '') {
            $category->cat_id = '';
        }else{
        $category->cat_id         = $request->input('cat_id');
        }
        $category->active         = $request->active == 'on' ? true : false;
        $category->addByUserId    = Auth::user()->id;
        $category->save();
        $Udatesku = Category::findOrFail($category->id);
        $category->sku = str_slug('1-'.$Udatesku->code.'-'.$request->input('sku')) ;
        $category->update();
        return redirect()->route('category.index')->withSuccessMessage(['Updated Has Been  Done']);
        // if ($files = $request->hasFile('image')) {
        //    $fileNameWithEex = $request->file('image')->getClientOriginalName();
        //    $fileName = $request->file('image')->getRealPath();
        //    $image = file_get_contents($fileName);
        //    $fileNameToStoreBase64 = base64_encode($image);
        //    $categoryImage = new Image;
        //    $categoryImage->category_id  = $category->id; 
        //    $categoryImage->image = $fileNameToStoreBase64;
        //    $categoryImage->save(); 
        // }else{

        //     $fileNameToStoreBase64 = null ;
        // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)  
    {
        $category =  Category::findOrFail($category->id);
            $products = Product::where('category_id' , '=' , $category->id)->get();
            foreach ($products as $product) {
                //dd($product->category_id);
            if($product->category_id == $category->id)
              return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }

            $images = Image::where('category_id' , '=' , $category->id)->get();
            foreach ($images as $image) {
                //dd($product->category_id);
            if($image->category_id == $category->id)
              $image->delete();
            }        
            $TimeEvent = TimeEvent::where('category_id' , '=' , $category->id)->get();
            foreach ($TimeEvent as $Time) {
            if($Time->category_id == $category->id)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
        $category->menus()->detach();
        $category->delete();
        return redirect()->route('category.index')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
