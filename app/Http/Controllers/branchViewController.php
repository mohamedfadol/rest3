<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;

class branchViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = branch::orderBy('branch_name', 'DESC')->paginate(1);

        //$branch = branch::all();
        return view('POS.branch-list', compact('branch', $branch));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('POS.createBranch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'branch_name' => 'required',
            'pass' => 'required|min:6',
            'repRight1' => 'required|numeric',
            'repRight2' => 'required|numeric',
            'repRight3' => 'required|numeric',
            'repRight4' => 'required|numeric',
            'repRight5' => 'required|numeric'
        ]);

        // create instance for model 
        $branch = new branch;

        $branch->branch_name = $request->input('branch_name');
        $branch->pass = $request->input('pass');
        $branch->repRight1 = $request->input('repRight1');
        $branch->repRight2 = $request->input('repRight2');
        $branch->repRight3 = $request->input('repRight3');
        $branch->repRight4 = $request->input('repRight4');
        $branch->repRight5 = $request->input('repRight5');
        $branch->save();
        return  redirect('/BranchList')->with('success', 'Inserted Was Done');
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
    public function edit($id)
    {
        $branch = branch::find($id);
        return view('POS.branch-edit', compact($branch, 'branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'branch_name' => 'required',
            'pass' => 'required|min:6',
            'repRight1' => 'required|numeric',
            'repRight2' => 'required|numeric',
            'repRight3' => 'required|numeric',
            'repRight4' => 'required|numeric',
            'repRight5' => 'required|numeric'
        ]);

        // create instance for model 
        $branch = branch::find($id);

        $branch->branch_name = $request->input('branch_name');
        $branch->pass = $request->input('pass');
        $branch->repRight1 = $request->input('repRight1');
        $branch->repRight2 = $request->input('repRight2');
        $branch->repRight3 = $request->input('repRight3');
        $branch->repRight4 = $request->input('repRight4');
        $branch->repRight5 = $request->input('repRight5');
        $branch->save();
        return  redirect('/BranchList')->with('success', 'Updated Was Done');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = branch::find($id);
        $branch->delete();
        return  redirect('/BranchList')->with('success', 'Removed Was Done');
    }
}