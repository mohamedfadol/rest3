<?php

namespace App\Http\Controllers\API;

use App\Table;
use App\Floor;
use App\Menu;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{


    public function getTable() 
    {
		$tables = Auth::user()->floor->tables;
		return response()->json($tables , 200 ); 
    }

}
