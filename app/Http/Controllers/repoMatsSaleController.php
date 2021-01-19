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
        $branches = branch::all();
        $users = Rest_User::all();
        return view('POS.RepoMatSal', ['branches' => $branches, 'users' => $users]);
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'datenew' => 'nullable',
            'endtime' => 'nullable',
            'branch' => 'required',
            'users' => 'required',
        ]);
        $startdate = Carbon::parse($request->datenew)->startOfDay()->toDateTimeString();
        $enddate = Carbon::parse($request->endtime)->endOfDay()->toDateTimeString();
        $branch = branch::find($request->branch);
        $users = Rest_User::find($request->users);
        $materials = orderdetails::select('mats.Code', 'mats.Name1')
            ->selectRaw("sum(orderdetails.Price) as Price")
            ->selectRaw("sum(orderdetails.Qty) as Qty")
            ->join('mats', 'mats.Guid', '=', 'orderdetails.MatGuid')
            ->join('orders', 'orders.Guid', '=', 'orderdetails.OrderGuid')
            ->whereBetween('orders.Date', [$startdate, $enddate])
            ->where('orders.branch_id', '=', $branch->branch_id)
            ->where('orderdetails.UserGuid', '=', $users->Guid)
            ->groupBy('mats.Code', 'mats.Name1')
            ->get();
        $branches = branch::all();
        $users = Rest_User::all();
        return view('POS.RepoMatSal', compact('materials', 'branches', 'users'));
    }
}