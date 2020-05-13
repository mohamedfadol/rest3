<?php

namespace App\Http\Controllers\API;


use App\Menu;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    
    public function getMenu()
    {
    	$menus = Auth::user()->floor->menu;
    	return response()->json($menus , 200 );
    }
}
