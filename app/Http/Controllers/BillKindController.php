<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;
use App\orders;

class billKindController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branch = branch::all();
        // return dd('n');
        // $branch = branch::all();
        return view('POS.billsNumber', compact($branch, 'branch'));
    }

    public function show(Request $request)
    {

        $this->validate($request, [
            'datenew' => 'required',
            'endtime' => 'required'
        ]);

        $branches = branch::all();

        return view('POS.billsNumber')->with([
            'branches'  => $branches,
            'startDate' => $request->input('datenew'),
            'endDate'   => $request->input('endtime')
        ]);
    }
}