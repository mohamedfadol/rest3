<?php

namespace App\Http\Controllers\API;

use App\Ingredient;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndrediantController extends Controller
{

	public function getIngrediant()
	{
		$ingrediants = Auth::user()->floor->menu->ingrediants();
		return response()->json($ingrediants, 200); 

	}


}
