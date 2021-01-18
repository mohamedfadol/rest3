<?php

namespace App\Http\Controllers;

use App\mats;
use App\branch;
use App\Rest_User;
use App\orderdetails;
use Carbon\Carbon;
use Illuminate\Http\Request;

class repoMatsSaleController extends Controller
{
    public function index()
    {
        $branch = branch::all();
        $users = Rest_User::all();
        return view('POS.RepoMatSal', ['branch' => $branch, 'users' => $users]);
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'datenew' => 'required',
            'endtime' => 'required'
        ]);
        $startdate = Carbon::parse($request->datenew)->startOfDay()->toDateTimeString();
        $enddate = Carbon::parse($request->endtime)->endOfDay()->toDateTimeString();
        $branches = branch::find($request->branch);
        $users = Rest_User::find($request->users);
        $materials = orderdetails::select('mats.Code', 'mats.Name1')
            ->selectRaw("sum(orderdetails.Price) as Price")
            ->selectRaw("sum(orderdetails.Qty) as Qty")
            ->join('mats', 'mats.Guid', '=', 'orderdetails.MatGuid')
            ->join('orders', 'orders.Guid', '=', 'orderdetails.OrderGuid')
            ->whereBetween('orders.Date', [$startdate, $enddate])
            ->where('orders.branch_id', '=', $branches->branch_id)
            ->where('orderdetails.UserGuid', '=', $users->Guid)
            ->groupBy('mats.Code', 'mats.Name1')
            ->get();
        $branch = branch::all();
        $users = Rest_User::all();
        return view('POS.RepoMatSal', compact('materials', 'branch', 'users'));
    }
}