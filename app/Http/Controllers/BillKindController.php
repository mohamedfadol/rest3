<?php

namespace App\Http\Controllers;

use App\branch;
use Illuminate\Http\Request;

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
        $branch = branch::all();

        return view('POS.billsNumber', compact($branch, 'branch'));
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'datenew' => 'nullable',
            'endtime' => 'nullable',
        ]);

        $branches = branch::all();

        return view('POS.billsNumber')->with([
            'branches' => $branches,
            'startDate' => $request->input('datenew'),
            'endDate' => $request->input('endtime'),
        ]);
    }
}
