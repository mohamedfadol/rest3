<?php

namespace App\Http\Controllers;

use App\Floor;
use App\User;
use App\Menu;
use App\Table;
use App\TableReserve;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class FloorController extends Controller 
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
        // get all the floors that belongsto thie branch 

        $floors =  Auth::user()->floors; 
        //dd($floors);
        return view('floors.index')->with(['floors' => $floors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() 
    {  
        $branches = Auth::user()->branches;
        $menus = Auth::user()->menus;
        return view('floors.create')->with(['branches' => $branches, 'menus' => $menus]);
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
            'name'             => 'required|string|unique:floors',
            'description'      => 'nullable|string',
            'menu_id'          => 'required|uuid',
            'branch_id'        => 'required|uuid'
        ]);  

        // create instance for model 
        $floor = new Floor; 
        
        $floor->name         = $request->input('name');
        $floor->description  = $request->input('description');
        $floor->menu_id      = $request->input('menu_id');
        $floor->branch_id    = $request->input('branch_id');
        $floor->addByUserId  = Auth::user()->id;
        $floor->save();  

        return  redirect()->route('floor.index')->withSuccessMessage('Inserted Was Done');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        $floor = Floor::findOrFail($floor->id);
        $branches = Auth::user()->branches;
        //$menus = Menu::all(); 
        $menus = Menu::where('addByUserId' , '=' , Auth::user()->id)->get();
        return view('floors.edit')
                    ->with([
                            'branches' => $branches ,
                             'floor' => $floor,
                             'menus' => $menus
                            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
             //dd($request->all()); 
        $this->validate($request,[
            'name'             => 'required|string|unique:floors,name,'.$floor->id,
            'description'      => 'nullable|string',
            'menu_id'          => 'required|uuid',
            'branch_id'        => 'required|uuid'
        ]);  

        // create instance for model 
        $floor = Floor::findOrFail($floor->id); 
        
        $floor->name         = $request->input('name');
        $floor->name         = $request->input('name');
        $floor->menu_id      = $request->input('menu_id');
        $floor->branch_id    = $request->input('branch_id');
        $floor->addByUserId  = Auth::user()->id;
        $floor->save();

        return  redirect()->route('floor.index')->withSuccessMessage('Update Was Done');
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Floor  $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        $floor =  Floor::findOrFail($floor->id);
            $tables = Table::where('floor_id' , '=' , $floor->id)->get();
            foreach ($tables as $table) {
            if($table->floor_id == $floor->id)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
            $TableReserve = TableReserve::where('floor_id' , '=' , $floor->id)->get();
            foreach ($TableReserve as $tableR) {
            if($tableR->floor_id == $floor->id)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
        $floor->delete();
        return redirect()->route('floor.index')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
