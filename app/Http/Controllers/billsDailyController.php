<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\branch;
use App\Rest_User;
use App\orders;
use Carbon\Carbon;

class billsDailyController extends Controller
{
    public function index()
    {
        $branches = branch::all();
        $users = Rest_User::all();
        return view('POS.billsDaily', ['branches' => $branches, 'users' => $users]);
    }

    public function show(Request $request)
    {
        $this->validate($request, [

            'startdate' => 'required',
            'enddate' => 'required'
        ]);

        $startdate = Carbon::parse($request->startdate)->startOfDay()->toDateTimeString();
        $enddate = Carbon::parse($request->enddate)->endOfDay()->toDateTimeString();
        $branches = branch::find($request->branch);
        $users = Rest_User::find($request->users);
        if (empty($branch) && !empty($users)) {
            $orders =  orders::whereBetween('Date', [$startdate, $enddate])->join('billkind', 'orders.billkind', '=', 'billkind.billkind')
                //->where('branch_id', '=',$branch->branch_id)
                ->where('UserGuid', '=', $users->Guid)
                ->Orderby('Number')->get();
            $branches = branch::all();
            $users = Rest_User::all();
            return view('POS.billsDaily', compact('orders', 'branches', 'users'));
        } else if (empty($users) && !empty($branch)) {
            $orders =  orders::whereBetween('Date', [$startdate, $enddate])->join('billkind', 'orders.billkind', '=', 'billkind.billkind')
                ->where('branch_id', '=', $branch->branch_id)
                //->where('UserGuid', '=',$users->Guid)
                ->Orderby('Number')->get();
            $branches = branch::all();
            $users = Rest_User::all();
            return view('POS.billsDaily', compact('orders', 'branches', 'users'));
        } else if (empty($branch) || empty($users)) {
            $orders =  orders::whereBetween('Date', [$startdate, $enddate])->join('billkind', 'orders.billkind', '=', 'billkind.billkind')
                //->where('branch_id', '=',$branch->branch_id)
                //->where('UserGuid', '=',$users->Guid)
                ->Orderby('Number')->get();
            $branches = branch::all();
            $users = Rest_User::all();
            return view('POS.billsDaily', compact('orders', 'branches', 'users'));
        } else {
            $orders =  orders::whereBetween('Date', [$startdate, $enddate])->join('billkind', 'orders.billkind', '=', 'billkind.billkind')
                ->where('branch_id', '=', $branch->branch_id)
                ->where('UserGuid', '=', $users->Guid)
                ->Orderby('Number')->get();
            $branches = branch::all();
            //($branches);
            $users = Rest_User::all();
            return view('POS.billsDaily', compact('orders', 'branches', 'users'));
        }
    }
}