<?php

namespace App\Http\Controllers\API;
use App\giftCard;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator; 

class GiftCardController extends Controller
{


	public function getAllG_Card()
	{
		$getAllG_Card =  Auth::user()->giftCard; 
		if(is_null($getAllG_Card))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
		return response()->json($getAllG_Card , 200 );
	}

	public function getG_CardById($id)
	{ 
		$getG_CardById = giftCard::findOrFail($id);

        if(is_null($getG_CardById))
        {
            return response()->json(["message" => "The Request Not Found!!"] , 404);
        }
    	return response()->json($getG_CardById,200);
	}


    public function createG_Card(Request $request) 
    {      
        $rules =[
                    'name'        => 'required',
                    'type'        => 'required',
                    'amount'      => 'required',
                    'ValidFrom'   => 'required',
                    'validTo'     => 'required',
                    'couponNumber'=> 'required',
                    'validOn'      => 'required'
                ];
        $validator = Validator::make($request->all() , $rules);
            if ($validator->fails()) 
            {
                return response()->json($validator->errors() , 400);
            } 
    		$createG_Card   = giftCard::create([
            'name'         => $request['name'],
            'type'         => $request['type'],
            'amount'       => $request['amount'],
            'ValidFrom'    => $request['ValidFrom'],
            'validTo'      => $request['validTo'],
            'couponNumber' => $request['couponNumber'],
            'validOn'      => $request['validOn'],
            'addByUserId'  => Auth::user()->id
        ]);
    	return response()->json($createG_Card , 201);
    }




    public function updateG_Card(Request $request ,$id)
    {
		$updateG_Card = giftCard::findOrFail($id);
            if(is_null($updateG_Card)){

                return response()->json(["message" => "The Request Not Found!!"] , 404);
            }
    		$updateG_Card->update([
            'name'         => $request['name'],
            'type'         => $request['type'],
            'amount'       => $request['amount'],
            'ValidFrom'    => $request['ValidFrom'],
            'validTo'      => $request['validTo'],
            'couponNumber' => $request['couponNumber'],
            'validOn'      => $request['validOn'],
            'addByUserId'  => Auth::user()->id
        ]);
    	return response()->json($updateG_Card , 200);
    }


    public function destroyG_Card(Request $request , $id)
    {
		$destroyG_Card = giftCard::findOrFail($id);

            if(is_null($destroyG_Card))
            {
                return response()->json(["message" => "The Request Not Found!!"]  , 404);
            }
    	    $destroyG_Card->delete();
    	return response()->json(null , 204);
    }


}
