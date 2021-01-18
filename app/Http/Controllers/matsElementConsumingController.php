<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mats;
use App\branch;
use App\orderdetails;
use Carbon\Carbon;
use App\MatDetails;
use App\MatsElements;

class matsElementConsumingController extends Controller
{

    public function index()
    {
        $branches = branch::all();
        return view('POS.matElementsConsuming', compact('branches', $branches));
    }

    public function show(Request $request)
    {
        $this->validate($request, [
            'datenew' => 'required',
            'endtime' => 'required'
        ]);

        $startDate = Carbon::parse($request->datenew)->startOfDay()->toDateTimeString();
        $endDate = Carbon::parse($request->endtime)->endOfDay()->toDateTimeString();
        //$branches = branch::find($request->branch);
        $branches = branch::all();

        // $materials = orderdetails::select('mats.Name1')
        // ->selectRaw("sum(orderdetails.Qty) as Qty")
        // ->leftJoin('mats', 'mats.Guid', '=', 'orderdetails.MatGuid')
        // ->leftJoin('orders', 'orders.Guid', '=', 'orderdetails.OrderGuid')
        // ->whereBetween('orders.Date',[$startDate,$endDate])
        // ->groupBy('mats.Name1')
        // ->get();

        $materials = MatDetails::select('matselements.Name', 'matdetails.Qty')
            ->selectRaw("sum(orderdetails.Qty) as Qtyo")
            ->join('mats', 'mats.Guid', '=', 'matdetails.MatGuid')
            ->join('matselements', 'matselements.Guid', '=', 'matdetails.MatElementGuid')
            ->join('orderdetails', 'orderdetails.MatGuid', '=', 'matdetails.MatGuid')
            ->join('orders', 'orders.Guid', '=', 'orderdetails.OrderGuid')
            ->whereBetween('orders.Date', [$startDate, $endDate])
            ->groupBy('matselements.Name', 'matdetails.Qty')
            ->get();
        // $materials = matsElements::all();
        // $materials = $materials->MatDetails()->first();
        // dd($materials);
        $branches = branch::all();
        return view('POS.matElementsConsuming')->with([
                'x' => 1,
                'branches'  => $branches,
                'materials' => $materials,
                'startDate' => $request->input('datenew'),
                'endDate'   => $request->input('endtime')
            ]);
    }
}