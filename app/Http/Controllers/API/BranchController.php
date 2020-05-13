<?php

namespace App\Http\Controllers\API;
use App\Branch;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{

    public function getAllBranch()
    {
    	$branch = Auth::user()->branch;
    	
    	return response()->json($branch , 200);
    }
 
} 
