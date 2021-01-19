<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mats;
use App\branch;
use App\orderdetails;
use Carbon\Carbon;

class sellingMoreItemsController extends Controller
{

    public function index()
    {
        $branches = branch::all();
        return view('POS.moreItemsSales', compact('branches', $branches));
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'datenew' => 'nullable',
            'endtime' => 'nullable'
        ]);

        $startDate = Carbon::parse($request->datenew)->startOfDay()->toDateTimeString();
        $endDate = Carbon::parse($request->endtime)->endOfDay()->toDateTimeString();
        $branches = branch::find($request->branch);
        //$branches = branch::all();

        $materials = orderdetails::select('mats.Name1')
            ->selectRaw("sum(orderdetails.Qty) as Qty")
            ->leftJoin('mats', 'mats.Guid', '=', 'orderdetails.MatGuid')
            ->leftJoin('orders', 'orders.Guid', '=', 'orderdetails.OrderGuid')
            ->whereBetween('orders.Date', [$startDate, $endDate])
            ->groupBy('mats.Name1')
            ->get();
        $branches = branch::all();
        //dd($materials);
        return view('POS.moreItemsSales')->with([
                'x' => 1,
                'branches'  => $branches,
                'materials' => $materials,
                'startDate' => $request->input('datenew'),
                'endDate'   => $request->input('endtime')
            ]);
    }
}