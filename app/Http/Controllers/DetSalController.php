<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;

class DetSalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $branch = branch::find($id);
        $branch = branch::all();
        return view('POS.DetSal', compact('branch', $branch));
    }


    public function show(Request $request)
    {
        $this->validate($request, [
            'datenew' => 'nullable',
            'endtime' => 'nullable'
        ]);

        $branches = branch::all();
        return view('POS.DetSal')->with([
                'branches'  => $branches,
                'startDate' => $request->input('datenew'),
                'endDate'   => $request->input('endtime')
            ]);
    }
}