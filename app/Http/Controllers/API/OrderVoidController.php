<?php

namespace App\Http\Controllers\API;

use App\voidOrder;
use App\Order;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator; 
class OrderVoidController extends Controller
{
	public function getAllOrderVoid()
	{
		$voidOrder =  Auth::user()->voidOrder;
		if(is_null($voidOrder))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
		return response()->json($voidOrder , 200 );
	}

	public function getOrderVoidById($id)
	{ 
		$getOrderVoidById = voidOrder::findOrFail($id);

        if(is_null($getOrderVoidById))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
    	return response()->json($getOrderVoidById,200);
	}


    public function createOrderVoid(Request $request)
    {
        $rules =[
                    'orderNumber'  => 'required',
                    'date'         => 'required',
                    'price'        => 'required',
                    'Qty'          => 'required',
                    'note'         => 'required',
                    'product_id'   => 'required'
                ];
        $validator = Validator::make($request->all() , $rules);
            if ($validator->fails()) 
            {
                return response()->json($validator->errors() , 400);
            } 
    		$createOrderVoid   = voidOrder::create([
            'orderNumber'  => $request['orderNumber'],
            'date'         => $request['date'],
            'price'        => $request['price'],
            'Qty'          => $request['Qty'],
            'note'         => $request['note'],
            'product_id'   => $request['product_id'],
            'addByUserId'  => Auth::user()->id
        ]);
    	return response()->json($createOrderVoid , 201);
    }




    public function updateOrderVoid(Request $request ,$id)
    {
		$updateOrderVoid = voidOrder::findOrFail($id);
            if(is_null($updateOrderVoid)){

                return response()->json(["message" => "The Request Not Found!!"] , 404);
            }
    		$updateOrderVoid->update([
            'orderNumber'  => $request['orderNumber'],
            'date'         => $request['date'],
            'price'        => $request['price'],
            'Qty'          => $request['Qty'],
            'note'         => $request['note'],
            'product_id'   => $request['product_id'],
            'addByUserId'  => Auth::user()->id
        ]);
    	return response()->json($updateOrderVoid , 200);
    }


    public function destroyOrderVoid(Request $request , $id)
    {
		$destroyOrderVoid = voidOrder::findOrFail($id);

            if(is_null($destroyOrderVoid))
            {
                return response()->json(["message" => "The Request Not Found!!"]  , 404);
            }
    	    $destroyOrderVoid->delete();
    	return response()->json(null , 204);
    }



}
