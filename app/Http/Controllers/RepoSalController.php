<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;

class RepoSalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $branches = branch::all();

        return view('POS.RepoSal');
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'datenew' => 'nullable',
            'endtime' => 'nullable'
        ]);

        $branches = branch::all();

        return view('POS.RepoSal')->with([
                'branches'  => $branches,
                'startDate' => $request->input('datenew'),
                'endDate'   => $request->input('endtime')
            ]);
    }
}