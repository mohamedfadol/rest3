<?php

namespace App\Http\Controllers\API;

use App\Floor;
use App\Menu;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FloorController extends Controller
{
 
    public function getFloor()
    {
		$floors = Auth::user()->floor;
		return response()->json($floors, 200); 
    }

    
}
