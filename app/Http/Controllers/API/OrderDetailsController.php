<?php

namespace App\Http\Controllers\API;

use App\Order;
use App\OrderDetail;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;  

class OrderDetailsController extends Controller
{

	public function getOrderDetailsById($id)
	{ 
		$getOrderDetailsById = OrderDetail::findOrFail($id);

        if(is_null($getOrderDetailsById))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
    	return response()->json($getOrderDetailsById,200);
	}


    public function createOrderDetails(Request $request) 
    {
        $rules =[
                    'OrderNumber'  => 'required',
                    'Qty'          => 'required',
                    'price'        => 'required',
                    'note'         => 'required',
                    'printed'      => 'required',
                    'date'         => 'required',
                    'delivaryDate' => 'required',
                    'order_id'     => 'required',
                    'product_id'   => 'required'
                ];
        $validator = Validator::make($request->all() , $rules);
            if ($validator->fails()) 
            {
                return response()->json($validator->errors() , 400);
            } 
    		$createOrderDetails   = OrderDetail::create([
            'OrderNumber'  => $request['OrderNumber'],
            'Qty'          => $request['Qty'],
            'price'        => $request['price'],
            'note'         => $request['note'],
            'printed'      => $request['printed'],
            'date'         => $request['date'],
            'delivaryDate' => $request['delivaryDate'],
            'order_id'     => $request['order_id'],
            'product_id'   => $request['product_id'],
            'addByUserId'  => Auth::user()->id
        ]);
    	return response()->json($createOrderDetails , 201);
    }




    public function updateOrderDetails(Request $request ,$id)
    {
		$updateOrderDetails = OrderDetail::findOrFail($id);
            if(is_null($updateOrderDetails)){

                return response()->json(["message" => "The Request Not Found!!"] , 404);
            }
    		$updateOrderDetails->update([
            'OrderNumber'  => $request['OrderNumber'],
            'Qty'          => $request['Qty'],
            'price'        => $request['price'],
            'note'         => $request['note'],
            'printed'      => $request['printed'],
            'date'         => $request['date'],
            'delivaryDate' => $request['delivaryDate'],
            'order_id'     => $request['order_id'],
            'product_id'   => $request['product_id'],
            'addByUserId'  => Auth::user()->id
        ]);
    	return response()->json($updateOrderDetails , 200);
    }


    public function destroyOrderDetails(Request $request , $id)
    {
		$destroyOrderDetails = OrderDetail::findOrFail($id);

            if(is_null($destroyOrderDetails))
            {
                return response()->json(["message" => "The Request Not Found!!"]  , 404);
            }
    	    $destroyOrderDetails->delete();
    	return response()->json(null , 204);
    }
}
