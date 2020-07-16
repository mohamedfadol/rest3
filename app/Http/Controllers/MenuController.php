<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Category;
use App\Floor;
use Auth; 
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
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
        //$menus = Menu::all();
        $menus =  Auth::user()->menus;
        return view('menus.index')->with(['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$categories = Category::all();
        $categories = Auth::user()->categories;
            return view('menus.create')->with(['categories' => $categories]);
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
            'name'          => 'required|string',
            'description'   => 'nullable|string'
        ]);

        $menu = new Menu;
        $menu->name        = $request->input('name');
        $menu->description = $request->input('description');
        $menu->addByUserId = Auth::user()->id;
        $menu->save();

        if (!empty($request->input('category_id')) ) {
                $menu->categories()->sync($request->input('category_id') , false);
        }else{ 

                $menu->categories()->sync(array()); 
        }
        return redirect()->route('menu.index')->withSuccessMessage(['Inserted Has Been  Done']);
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        $menu  = Menu::findOrFail($menu->id);

        $categories = Category::where('addByUserId' , '=' , Auth::user()->id)->get();
        return view('menus.edit')->with(['categories' => $categories , 'menu' => $menu]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
            //dd($request->all()); 
        $this->validate($request,[
            'name'          => 'required|string|unique:floors',
            'description'   => 'nullable|string'
        ]);

        $menu = Menu::findOrFail($menu->id);
        $menu->name        = $request->input('name');
        $menu->description = $request->input('description');
        $menu->addByUserId = Auth::user()->id;
        $menu->save();
        if (!empty($request->input('category_id')) ) {
            $menu->categories()->sync($request->input('categories'));
        }else{
            $menu->categories()->sync(array()); 
        }
        
        return redirect()->route('menu.index')->with(['Updated Has Been  Done']);
    }  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu = Menu::findOrFail($menu->id);
            $floors = Floor::where('menu_id' , '=' , $menu->id)->get();
            foreach ($floors as $floor) {
            if($floor->menu_id == $menu->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
        $menu->categories()->detach();
        $menu->delete();
        return redirect()->route('menu.index')->with(['Deleted Has Been  Done']);
    }
}
