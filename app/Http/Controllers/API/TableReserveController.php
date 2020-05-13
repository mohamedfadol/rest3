<?php

namespace App\Http\Controllers\API;

use App\TableReserve;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator; 

class TableReserveController extends Controller
{

	public function getAllTableReser()
	{
		$getAllTableReser =  Auth::user()->tableReserve;
		if(is_null($getAllTableReser))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
		return response()->json($getAllTableReser , 200 );
	}

	public function getTableReserById($id)
	{ 
		$getTableReserById = TableReserve::findOrFail($id);

        if(is_null($getTableReserById))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
    	return response()->json($getTableReserById,200);
	}


    public function createTableReser(Request $request) 
    {      
        $rules =[
                    'customerPhone'   => 'required',
                    'dateFrom'        => 'required',
                    'dateTo'          => 'required',
                    'payment'         => 'required',
                    'paymentMinorder' => 'required',
                    'minorderValue'   => 'required',
                    'enterFee'        => 'required',
                    'note'            => 'required',
                    'startDate'       => 'required',
                    'total'           => 'required',
                    'floor_id'        => 'required'
                ];
        $validator = Validator::make($request->all() , $rules);
            if ($validator->fails()) 
            {
                return response()->json($validator->errors() , 400);
            } 
    		$createTableReser   = TableReserve::create([
            'customerPhone'  => $request['customerPhone'],
            'dateFrom'       => $request['dateFrom'],
            'dateTo'         => $request['dateTo'],
            'payment'        => $request['payment'],
            'paymentMinorder'=> $request['paymentMinorder'],
            'minorderValue'  => $request['minorderValue'],
            'enterFee'       => $request['enterFee'],
            'note'           => $request['note'],
            'startDate'      => $request['startDate'],
            'total'          => $request['total'],
            'floor_id'       => $request['floor_id'],
            'addByUserId'    => Auth::user()->id
        ]);
    	return response()->json($createTableReser , 201);
    }




    public function updateTableReser(Request $request ,$id)
    {
		$updateTableReser = TableReserve::findOrFail($id);
            if(is_null($updateTableReser)){

                return response()->json(["message" => "The Request Not Found!!"] , 404);
            }
    		$updateTableReser->update([
            'customerPhone'  => $request['customerPhone'],
            'dateFrom'       => $request['dateFrom'],
            'dateTo'         => $request['dateTo'],
            'payment'        => $request['payment'],
            'paymentMinorder'=> $request['paymentMinorder'],
            'minorderValue'  => $request['minorderValue'],
            'enterFee'       => $request['enterFee'],
            'note'           => $request['note'],
            'startDate'      => $request['startDate'],
            'total'          => $request['total'],
            'floor_id'       => $request['floor_id'],
            'addByUserId'    => Auth::user()->id
        ]);
    	return response()->json($updateTableReser , 200);
    }


    public function destroyTableReser(Request $request , $id)
    {
		$destroyTableReser = TableReserve::findOrFail($id);

            if(is_null($destroyTableReser))
            {
                return response()->json(["message" => "The Request Not Found!!"]  , 404);
            }
    	    $destroyTableReser->delete();
    	return response()->json(null , 204);
    }


}
