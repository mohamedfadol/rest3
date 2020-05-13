<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Branch;
use App\User;
use App\Table;
use App\TimeEvent;
use App\Order;
use App\Floor;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');

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
        $branches = Branch::all();
        return view('admins.index')->withBranches($branches);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function controlBranch() 
    {   
        $branchesOwners = User::all();
        return view('admins.control')->withbranchesOwners($branchesOwners);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function payment(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->payment  = 1;
        $user->save();
        return  redirect()->route('admin.control')
                ->withSuccessMessage('Update ' . $user->businessName . ' Was Done For Payment');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function active(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->active  = 1;
        $user->save();
        return  redirect()->route('admin.control')
                ->withSuccessMessage('Update ' . $user->businessName . ' Was Done For Active');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function enable(User $user)
    {
        $user = User::findOrFail($user->id);
        $user->enable  = 1;
        $user->save();
        return  redirect()->route('admin.control')
                ->withSuccessMessage('Update ' . $user->businessName . ' Was Done For Enabled');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $branch = Branch::find($branch->id);
        return view('admins.edit')->with(['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
             //dd($request->name);
        $this->validate($request,[
            'name'             => 'required|string|unique:branches,name,'.$branch->id,
        ]); 

        $branch = Branch::findOrFail($branch->id);
        $branch->name  = $request->input('name');
        $branch->save();
        return  redirect()->route('admin.dashboard')->withSuccessMessage('Update ' . $branch->name . ' Was Done');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch = Branch::findOrFail($branch->id);

            $users = User::where('id' , $branch->addByUserId)->get();
            foreach ($users as $user) {
            if($user->id == $branch->addByUserId)
                return redirect()->back()->withWarningMessage([' Can Not Delete Has Parent']);
            }
            $tables = Table::where('branch_id' , '=' , $branch->id)->get();
            foreach ($tables as $table) {
            if($table->branch_id == $branch->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
            $TimeEvent = TimeEvent::where('branch_id' , '=' , $branch->id)->get();
            foreach ($TimeEvent as $Time) {
            if($Time->branch_id == $branch->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
            $Orders = Order::where('branch_id' , '=' , $branch->id)->get();
            foreach ($Orders as $Order) {
            if($Order->branch_id == $branch->id)
                return redirect()->back()->withWarningMessage(['Can Not Delete Has Parent']);
            }
        $branch->floors()->detach();
        $branch->delete();
        return redirect()->route('branch.home')->withSuccessMessage(['Deleted Has Been  Done']);
    }
}
