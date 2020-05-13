<?php

namespace App\Http\Controllers\API;

use App\Product;
use App\Category;
use App\Ingredient;
use App\Modifire;
use App\Image;
use App\Discount;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   
   public function getProduct()
   {
		$AllProducts =  auth::user()->floor->menu->products();
		return response()->json($AllProducts , 200 ); 
   }


}
