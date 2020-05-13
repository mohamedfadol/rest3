<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Product;
use App\Menu;
use App\Image;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    

	public function getCategory()
	{
		$categories = auth::user()->floor->menu->categories;
		return response()->json($categories , 200 ); 
	}


}
