<?php

namespace App\Http\Controllers\API;

use App\Modifire;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ModefierController extends Controller
{
   
   public function getModifier()
   {	

		$modifires = Auth::user()->floor->menu->modifires();
		return response()->json($modifires, 200); 
   }


}

