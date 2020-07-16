<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
class DeleveryController extends Controller
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
        $branches = Auth::user()->branches;
        $branchName = $branches->first();
        $branchname =$branchName->slugable;
        return view('deleveries.index',['deliveries' => Delivery::all(),'branchname'=>$branchname]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Auth::user()->branches;
        return view('deleveries.create',[
                    'deliveries' => Delivery::all(),
                    'branches' => $branches
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
        //dd($request->all()); 
        $this->validate($request,[
            'image'      => 'required|image',
            'name'       => 'required',
            'phone'      => 'required',
            'motortype'  => 'nullable',
            'number'     => 'required',
            'branch_id'  => 'required',
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
            $folder = 'public/'.$branchName.'/delevery';
            $path = $request->file('image')->storeAs($folder, $fileNameToStore);
            // dd($path);
        }else{
            $fileNameToStore = 'No Images To Store In .jpg';
        }

        $delevery = new Delivery;
        $delevery->image     = $fileNameToStore;
        $delevery->name      = $request->input('name');
        $delevery->motortype = $request->input('motortype');
        $delevery->number    = $request->input('number');
        $delevery->phone     = $request->input('phone');
        $delevery->branch_id  = $request->input('branch_id');
        $delevery->addByUserId = Auth::user()->id;
        $delevery->save();   
        return redirect()->route('delevery.index')->withSuccessMessage(['Inserted Has Been  Done']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delevery)
    {
        $delevery = Delivery::findOrFail($delevery->id);
        $branches = Auth::user()->branches;
        return view('deleveries.edit')->with(['branches' => $branches ,'delevery' => $delevery]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delevery)
    {
        //dd($request->all()); 
        $this->validate($request,[
            'image'      => 'required|image',
            'name'       => 'required',
            'phone'      => 'required',
            'motortype'  => 'nullable',
            'number'     => 'required',
            'branch_id'  => 'required',
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
            $folder = 'public/'.$branchName.'/delevery';
            $path = $request->file('image')->storeAs($folder, $fileNameToStore);
            // dd($path);
        }else{
            $fileNameToStore = 'No Images To Store In .jpg';
        }

        $delevery = Delivery::findOrFail($delevery->id);
        $delevery->image     = $fileNameToStore;
        $delevery->name      = $request->input('name');
        $delevery->motortype = $request->input('motortype');
        $delevery->number    = $request->input('number');
        $delevery->phone     = $request->input('phone');
        $delevery->branch_id  = $request->input('branch_id');
        $delevery->addByUserId = Auth::user()->id;
        $delevery->save();   
        return redirect()->route('delevery.index')->withSuccessMessage(['Updated Has Been  Done']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delevery)
    {
        $delevery = Delivery::findOrFail($delevery->id);
        if (!$delevery) {
        return redirect()->route('delevery.index')->withSuccessMessage(['Can Not Delete It']);
        }
        $delevery->delete();
        return redirect()->route('delevery.index')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
