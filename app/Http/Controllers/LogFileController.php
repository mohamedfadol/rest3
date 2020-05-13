<?php

namespace App\Http\Controllers;

use App\LogFile;
use Illuminate\Http\Request;

class LogFileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LogFile  $logFile
     * @return \Illuminate\Http\Response
     */
    public function show(LogFile $logFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LogFile  $logFile
     * @return \Illuminate\Http\Response
     */
    public function edit(LogFile $logFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LogFile  $logFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogFile $logFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LogFile  $logFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogFile $logFile)
    {
        //
    }
}
