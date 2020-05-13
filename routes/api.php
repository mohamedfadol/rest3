<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
 


/* Api for login to app */ 
Route::post('login','API\UserController@login');
Route::post('register', 'API\UserController@register');
 Route::get('getUser', 'API\UserController@getUser')->middleware('auth:api');
// route for logout for user API session
Route::get('logout','API\UserController@logout')->middleware('auth:api');


// branch for auth user
Route::get('getAllBranch','API\BranchController@getAllBranch')->middleware('auth:api');

// Floor for auth user 
Route::get('getFloor','API\FloorController@getFloor')->middleware('auth:api');

// Table for auth user 
Route::get('getTable','API\TableController@getTable')->middleware('auth:api');

// Menu for auth user 
Route::get('getMenu','API\MenuController@getMenu')->middleware('auth:api');

// category for auth user 
Route::get('getCategory','API\CategoryController@getCategory')->middleware('auth:api');

// Product for auth user 
Route::get('getProduct','API\ProductController@getProduct')->middleware('auth:api');

// Ingrediant for auth user 
Route::get('getIngrediant','API\IndrediantController@getIngrediant')->middleware('auth:api');

// Modifier for auth user 
Route::get('getModifier','API\ModefierController@getModifier')->middleware('auth:api');

// Class Products for auth user 
Route::get('getClass','API\ClassController@getClass')->middleware('auth:api');


//route order for auth user 
Route::get('getAllOrder','API\OrderController@getAllOrder')->middleware('auth:api');
Route::get('getOrderById/{id}','API\OrderController@getOrderById')->middleware('auth:api');
Route::post('createOrder','API\OrderController@createOrder')->middleware('auth:api');
Route::put('updateOrder/{id}','API\OrderController@updateOrder')->middleware('auth:api');
Route::delete('destroyOrder/{id}','API\OrderController@destroyOrder')->middleware('auth:api');

//route Order Details for auth user 
Route::get('getAllOrderDetails','API\OrderDetailsController@getAllOrderDetails')->middleware('auth:api');
Route::get('getOrderDetailsById/{id}','API\OrderDetailsController@getOrderDetailsById')->middleware('auth:api');
Route::post('createOrderDetails','API\OrderDetailsController@createOrderDetails')->middleware('auth:api');
Route::put('updateOrderDetails/{id}','API\OrderDetailsController@updateOrderDetails')->middleware('auth:api');
Route::delete('destroyOrderDetails/{id}','API\OrderDetailsController@destroyOrderDetails')->middleware('auth:api');

//route order for auth user 
Route::get('getAllOrderVoid','API\OrderVoidController@getAllOrderVoid')->middleware('auth:api');
Route::get('getOrderVoidById/{id}','API\OrderVoidController@getOrderVoidById')->middleware('auth:api');
Route::post('createOrderVoid','API\OrderVoidController@createOrderVoid')->middleware('auth:api');
Route::put('updateOrderVoid/{id}','API\OrderVoidController@updateOrderVoid')->middleware('auth:api');
Route::delete('destroyOrderVoid/{id}','API\OrderVoidController@destroyOrderVoid')->middleware('auth:api');

//route Table Reserve for auth user 
Route::get('getAllTableReser','API\TableReserveController@getAllTableReser')->middleware('auth:api');
Route::get('getTableReserById/{id}','API\TableReserveController@getTableReserById')->middleware('auth:api');
Route::post('createTableReser','API\TableReserveController@createTableReser')->middleware('auth:api');
Route::put('updateTableReser/{id}','API\TableReserveController@updateTableReser')->middleware('auth:api');
Route::delete('destroyTableReser/{id}','API\TableReserveController@destroyTableReser')->middleware('auth:api');

//route Gift Card for auth user 
Route::get('getAllG_Card','API\GiftCardController@getAllG_Card')->middleware('auth:api');
Route::get('getG_CardById/{id}','API\GiftCardController@getG_CardById')->middleware('auth:api');
Route::post('createG_Card','API\GiftCardController@createG_Card')->middleware('auth:api');
Route::put('updateG_Card/{id}','API\GiftCardController@updateG_Card')->middleware('auth:api');
Route::delete('destroyG_Card/{id}','API\GiftCardController@destroyG_Card')->middleware('auth:api');

//route Bill Kind for auth user 
Route::get('getAllBill','API\BillKindController@getAllBill')->middleware('auth:api');
Route::get('getBillById/{id}','API\BillKindController@getBillById')->middleware('auth:api');
Route::post('createBill','API\BillKindController@createBill')->middleware('auth:api');
Route::put('updateBill/{id}','API\BillKindController@updateBill')->middleware('auth:api');
Route::delete('destroyBill/{id}','API\BillKindController@destroyBill')->middleware('auth:api');