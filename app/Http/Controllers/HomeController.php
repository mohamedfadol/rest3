<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;


class HomeController extends Controller
{
public function index(Request $request)
    {
        return view('POS.index');
    }
}// end class HomeController