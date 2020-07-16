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

Route::group(['middleware' => ['auth.employees','auth:api']], function() { 

 Route::get('getUser', 'API\UserController@getUser')->middleware('auth:api');
// route for logout for user API session
Route::get('logout','API\UserController@logout')->middleware('auth:api');


// branch for auth user
Route::get('getAllBranch','API\BranchController@getAllBranch'); 

// Floor for auth user 
Route::get('getFloor','API\FloorController@getFloor');

// Table for auth user 
Route::get('getTable','API\TableController@getTable');

// Menu for auth user 
Route::get('getMenu','API\MenuController@getMenu');

// category for auth user 
Route::get('getCategory','API\CategoryController@getCategory');

// Product for auth user 
Route::get('getProduct','API\ProductController@getProduct');

// Ingrediant for auth user 
Route::get('getIngrediant','API\IndrediantController@getIngrediant');

// Modifier for auth user 
Route::get('getModifier','API\ModefierController@getModifier');

// Class Products for auth user 
Route::get('getClass','API\ClassController@getClass');


//route order for auth user 
Route::get('getAllOrder','API\OrderController@getAllOrder');
Route::get('getOrderById/{id}','API\OrderController@getOrderById');
Route::post('createOrder','API\OrderController@createOrder');
Route::put('updateOrder/{id}','API\OrderController@updateOrder');
Route::delete('destroyOrder/{id}','API\OrderController@destroyOrder');

//route Order Details for auth user 
Route::get('getAllOrderDetails','API\OrderDetailsController@getAllOrderDetails');
Route::get('getOrderDetailsById/{id}','API\OrderDetailsController@getOrderDetailsById');
Route::post('createOrderDetails','API\OrderDetailsController@createOrderDetails');
Route::put('updateOrderDetails/{id}','API\OrderDetailsController@updateOrderDetails');
Route::delete('destroyOrderDetails/{id}','API\OrderDetailsController@destroyOrderDetails');

//route order for auth user 
Route::get('getAllOrderVoid','API\OrderVoidController@getAllOrderVoid');
Route::get('getOrderVoidById/{id}','API\OrderVoidController@getOrderVoidById');
Route::post('createOrderVoid','API\OrderVoidController@createOrderVoid');
Route::put('updateOrderVoid/{id}','API\OrderVoidController@updateOrderVoid');
Route::delete('destroyOrderVoid/{id}','API\OrderVoidController@destroyOrderVoid');

//route Table Reserve for auth user 
Route::get('getAllTableReser','API\TableReserveController@getAllTableReser');
Route::get('getTableReserById/{id}','API\TableReserveController@getTableReserById');
Route::post('createTableReser','API\TableReserveController@createTableReser');
Route::put('updateTableReser/{id}','API\TableReserveController@updateTableReser');
Route::delete('destroyTableReser/{id}','API\TableReserveController@destroyTableReser');

//route Gift Card for auth user 
Route::get('getAllG_Card','API\GiftCardController@getAllG_Card');
Route::get('getG_CardById/{id}','API\GiftCardController@getG_CardById');
Route::post('createG_Card','API\GiftCardController@createG_Card');
Route::put('updateG_Card/{id}','API\GiftCardController@updateG_Card');
Route::delete('destroyG_Card/{id}','API\GiftCardController@destroyG_Card');

//route Bill Kind for auth user 
Route::get('getAllBill','API\BillKindController@getAllBill');
Route::get('getBillById/{id}','API\BillKindController@getBillById');
Route::post('createBill','API\BillKindController@createBill');
Route::put('updateBill/{id}','API\BillKindController@updateBill');
Route::delete('destroyBill/{id}','API\BillKindController@destroyBill');

});