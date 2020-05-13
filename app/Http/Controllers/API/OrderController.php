<?php

namespace App\Http\Controllers\API;

use App\Order;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;  

class OrderController extends Controller
{

	public function getOrderById($id)
	{ 
		$getOrderById = Order::findOrFail($id);

        if(is_null($getOrderById))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
    	return response()->json($getOrderById,200);
	}


    public function createOrder(Request $request)
    {
        $rules =[
                    'number'         => 'required|numeric',
                    'dailyNumber'    => 'nullable|numeric',
                    'date'       	 => 'nullable|string',
                    'billDate'       => 'nullable|string',
                    'delivaryDate'   => 'nullable|string',
                    'billSatate'     => 'nullable|string',
                    'paymentType'    => 'nullable|string',
                    'total'          => 'nullable',
                    'discount'       => 'nullable',
                    'discountPerCent'=> 'nullable',
                    'extra'          => 'nullable',
                    'tax'            => 'nullable',
                    'sevice'         => 'nullable',
                    'note'           => 'nullable|string ',
                    'printredCount'  => 'nullable|numeric',
                    'remain'         => 'nullable',
                    'branch_id'      => 'required|uuid',
                    'customer_id'    => 'required|uuid',
                    'table_id'       => 'required|uuid',
                    'bill_id'        => 'required|uuid'
                ];
        $validator = Validator::make($request->all() , $rules);
            if ($validator->fails()) 
            {
                return response()->json($validator->errors() , 400);
            } 
    		$createorder = Order::create([
            'number'         => $request['number'],
            'dailyNumber'    => $request['dailyNumber'],
            'date'           => $request['date'],
            'billDate'       => $request['billDate'],
            'delivaryDate'   => $request['delivaryDate'],
            'billSatate'     => $request['billSatate'],
            'paymentType'    => $request['paymentType'],
            'total'          => $request['total'],
            'discount'       => $request['discount'],
            'discountPerCent'=> $request['discountPerCent'],
            'extra'          => $request['extra'],
            'tax'            => $request['tax'],
            'sevice'         => $request['sevice'],
            'note'           => $request['note'],
            'printredCount'  => $request['printredCount'],
            'remain'         => $request['remain'],
            'branch_id'      => $request['branch_id'],
            'customer_id'    => $request['customer_id'],
            'table_id'       => $request['table_id'],
            'bill_id'        => $request['bill_id'],
            'addByUserId'    => Auth::user()->id
        ]);
    	return response()->json($createorder , 201);
    }


    public function updateOrder(Request $request ,$id)
    {
		$updateOrderById = Order::findOrFail($id);
            if(is_null($updateOrderById)){

                return response()->json(["message" => "The Request Not Found!!"] , 404);
            }
    		$updateOrderById->update([
            'number'         => $request['number'],
            'dailyNumber'    => $request['dailyNumber'],
            'date'           => $request['date'],
            'billDate'       => $request['billDate'],
            'delivaryDate'   => $request['delivaryDate'],
            'billSatate'     => $request['billSatate'],
            'paymentType'    => $request['paymentType'],
            'total'          => $request['total'],
            'discount'       => $request['discount'],
            'discountPerCent'=> $request['discountPerCent'],
            'extra'          => $request['extra'],
            'tax'            => $request['tax'],
            'sevice'         => $request['sevice'],
            'note'           => $request['note'],
            'printredCount'  => $request['printredCount'],
            'remain'         => $request['remain'],
            'branch_id'      => $request['branch_id'],
            'customer_id'    => $request['customer_id'],
            'table_id'       => $request['table_id'],
            'bill_id'        => $request['bill_id'],
            'addByUserId'    => Auth::user()->id
        ]);
    	return response()->json($updateOrderById , 200);
    }


    public function destroyOrder(Request $request , $id)
    {
		$deletOrderById = Order::findOrFail($id);

            if(is_null($deletOrderById))
            {
                return response()->json(["message" => "The Request Not Found!!"]  , 404);
            }
    	    $deletOrderById->delete();
    	return response()->json(null , 204);
    }

    
}
