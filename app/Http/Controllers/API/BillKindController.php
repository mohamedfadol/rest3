<?php

namespace App\Http\Controllers\API;

use App\BillKind;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillKindController extends Controller
{
    public function getAllBill()
    {
    	$billKind = Auth::user()->billKind;
    	
    	return response()->json($billKind , 200);
    }

	public function getBillById($id)
	{ 
		$getBillById = BillKind::findOrFail($id);

        if(is_null($getBillById))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
    	return response()->json($getBillById,200);
	}


    public function createBill(Request $request)
    {
        $rules =[
                    'BillKindNumber'      => 'required|numeric',
                    'BillKindName'        => 'required|numeric',
                    'BillKindNameEnglish' => 'required|string'
                ];
        $validator = Validator::make($request->all() , $rules);
            if ($validator->fails()) 
            {
                return response()->json($validator->errors() , 400);
            } 
    		$createBill = BillKind::create([
            'BillKindNumber'      => $request['BillKindNumber'],
            'BillKindName'        => $request['BillKindName'],
            'BillKindNameEnglish' => $request['BillKindNameEnglish'], 
            'addByUserId'         => Auth::user()->id
        ]);
    	return response()->json($createBill , 201);
    }


    public function updateBill(Request $request ,$id)
    {
		$updateBill = BillKind::findOrFail($id);
            if(is_null($updateBill)){

                return response()->json(["message" => "The Request Not Found!!"] , 404);
            }
    		$updateBill->update([
            'BillKindNumber'      => $request['BillKindNumber'],
            'BillKindName'        => $request['BillKindName'],
            'BillKindNameEnglish' => $request['BillKindNameEnglish'], 
            'addByUserId'         => Auth::user()->id
        ]);
    	return response()->json($updateBill , 200);
    }


    public function destroyBill(Request $request , $id)
    {
		$destroyBill = BillKind::findOrFail($id);

            if(is_null($destroyBill))
            {
                return response()->json(["message" => "The Request Not Found!!"]  , 404);
            }
    	    $destroyBill->delete();
    	return response()->json(null , 204);
    }

    
}
