<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome'); 

    //     Artisan::call('cache:clear');
    // return "Cache is cleared";
}); 

Auth::routes();    

// Start Admin Route Group For Aurages Panel
Route::prefix('admin')->group(function() {  
// Start Login Route For Aurages Panel
Route::get('/login','Auth\adminLoginController@showLoginForm')->name('admin.login');
Route::post('/login','Auth\adminLoginController@login')->name('admin.login.submit');
// End Login Route For Aurages Panel
// Start Registration Route For Aurages Panel
Route::get('/register','Auth\adminRegisterController@showRegisterForm')->name('admin.register');
Route::post('/register','Auth\adminRegisterController@createAdmin')->name('admin.register.submit');
// End Registration Route For Aurages Panel
// logout For Admin For Aurages Panel
Route::post('/logout','Auth\adminLoginController@logoutAdmin')->name('admin.logout');
// Admin Home Route For Aurages Panel to show all branches
Route::get('/','AdminController@index')->name('admin.dashboard'); 
// Admin Control Route For Control Branch setting 
Route::get('/control','AdminController@controlBranch')->name('admin.control');
// Admin Control Route For Set Owner Payment for the Branch setting 
Route::get('/payment/{user}','AdminController@payment')->name('admin.branch.payment');
// Admin Control Route For Set Owner Active for the Branch setting 
Route::get('/active/{user}','AdminController@active')->name('admin.branch.active');
// Admin Control Route For Set Owner Enable for the Branch setting 
Route::get('/enable/{user}','AdminController@enable')->name('admin.branch.enable');

// Start Branch Route For Aurages Panel
Route::get('/branch/{branch}/edit','AdminController@edit')->name('admin.branch.edit');
Route::PUT('/branch/{branch}/update','AdminController@update')->name('admin.branch.update');
Route::get('/branch/{branch}/destroy','AdminController@destroy')->name('admin.branch.destroy');
// End Branch Route For Aurages Panel

}); //  End Admin Route Group For Aurages Panel


// logout for a user Separated from logout of defaulte loginController But Still Work the defaulte login
Route::get('/logout','Auth\LoginController@logout')->name('logout');

Route::get('/branch','BranchController@index')->name('branch.home')->middleware('auth');
Route::get('/branch/create/','BranchController@create')->name('branch.create')->middleware('auth');
Route::POST('/branch/create/','BranchController@store')->name('branch.store')->middleware('auth');
Route::get('/branch/{branch}/edit','BranchController@edit')->name('branch.edit')->middleware('auth');
Route::PUT('/branch/{branch}/update','BranchController@update')->name('branch.update')->middleware('auth');
Route::get('/branch/{branch}/destroy','BranchController@destroy')->name('branch.destroy')->middleware('auth');


Route::get('/floor','FloorController@index')->name('floor.home');
Route::get('/floor/create','FloorController@create')->name('floor.create');
Route::POST('/floor/create','FloorController@store')->name('floor.store');
Route::get('/floor/{floor}/edit','FloorController@edit')->name('floor.edit');
Route::PUT('/floor/{floor}/update','FloorController@update')->name('floor.update');
Route::get('/floor/{floor}/destroy','FloorController@destroy')->name('floor.destroy');


Route::get('/category','CategoryController@index')->name('category.home');
Route::get('/category/create','CategoryController@create')->name('category.create');
Route::POST('/category/create','CategoryController@store')->name('category.store');
Route::get('/category/{category}/edit','CategoryController@edit')->name('category.edit');
Route::PUT('/category/{category}/update','CategoryController@update')->name('category.update');
Route::get('/category/{category}/destroy','CategoryController@destroy')->name('category.destroy');


Route::get('/menu','MenuController@index')->name('menu.home');
Route::get('/menu/create','MenuController@create')->name('menu.create');
Route::POST('/menu/create','MenuController@store')->name('menu.store');
Route::get('/menu/{menu}/edit','MenuController@edit')->name('menu.edit');
Route::PUT('/menu/{menu}/update','MenuController@update')->name('menu.update');
Route::get('/menu/{menu}/destroy','MenuController@destroy')->name('menu.destroy');


Route::get('/product','ProductController@index')->name('product.home'); 
Route::get('/product/create','ProductController@create')->name('product.create');
Route::POST('/product/create','ProductController@store')->name('product.store');
Route::get('/product/{product}/edit','ProductController@edit')->name('product.edit');
Route::PUT('/product/{product}/update','ProductController@update')->name('product.update');
Route::get('/product/{product}/destroy','ProductController@destroy')->name('product.destroy');

Route::get('/class','ClassProductController@index')->name('class.home'); 
Route::get('/class/create','ClassProductController@create')->name('class.create');
Route::POST('/class/create','ClassProductController@store')->name('class.store');
Route::get('/class/{classProduct}/edit','ClassProductController@edit')->name('class.edit');
Route::PUT('/class/{classProduct}/update','ClassProductController@update')->name('class.update');
Route::get('/class/{classProduct}/destroy','ClassProductController@destroy')->name('class.destroy');

Route::get('/modifire','ModifireController@index')->name('modifire.home');
Route::get('/modifire/create','ModifireController@create')->name('modifire.create');
Route::POST('/modifire/create','ModifireController@store')->name('modifire.store');
Route::get('/modifire/{modifire}/edit','ModifireController@edit')->name('modifire.edit');
Route::PUT('/modifire/{modifire}/update','ModifireController@update')->name('modifire.update');
Route::get('/modifire/{modifire}/destroy','ModifireController@destroy')->name('modifire.destroy');


Route::get('/ingredient','IngredientController@index')->name('ingredient.home');
Route::get('/ingredient/create','IngredientController@create')->name('ingredient.create');
Route::POST('/ingredient/create','IngredientController@store')->name('ingredient.store');
Route::get('/ingredient/{ingredient}/edit','IngredientController@edit')->name('ingredient.edit');
Route::PUT('/ingredient/{ingredient}/update','IngredientController@update')->name('ingredient.update');
Route::get('/ingredient/{ingredient}/destroy','IngredientController@destroy')->name('ingredient.destroy');

Route::get('/customer','CustomerController@index')->name('customer.home'); 
Route::get('/customer/create','CustomerController@create')->name('customer.create');
Route::POST('/customer/create','CustomerController@store')->name('customer.store');
Route::get('/customer/{customer}/edit','CustomerController@edit')->name('customer.edit');
Route::PUT('/customer/{customer}/update','CustomerController@update')->name('customer.update');
Route::get('/customer/{customer}/destroy','CustomerController@destroy')->name('customer.destroy');


Route::get('/discount','DiscountController@index')->name('discount.home');
Route::get('/discount/create','DiscountController@create')->name('discount.create');
Route::POST('/discount/create','DiscountController@store')->name('discount.store');
Route::get('/discount/{discount}/edit','DiscountController@edit')->name('discount.edit');
Route::PUT('/discount/{discount}/update','DiscountController@update')->name('discount.update');
Route::get('/discount/{discount}/destroy','DiscountController@destroy')->name('discount.destroy');


Route::get('/giftcard','GiftCardController@index')->name('giftcard.home');
Route::get('/giftcard/create','GiftCardController@create')->name('giftcard.create');
Route::POST('/giftcard/create','GiftCardController@store')->name('giftcard.store');
Route::get('/giftcard/{giftCard}/edit','GiftCardController@edit')->name('giftcard.edit');
Route::PUT('/giftcard/{giftCard}/update','GiftCardController@update')->name('giftcard.update');
Route::get('/giftcard/{giftCard}/destroy','GiftCardController@destroy')->name('giftcard.destroy');
 

Route::get('/billKind','BillKindController@index')->name('billKind.home');
Route::get('/billKind/create','BillKindController@create')->name('billKind.create');
Route::POST('/billKind/create','BillKindController@store')->name('billKind.store');
Route::get('/billKind/{billKind}/edit','BillKindController@edit')->name('billKind.edit');
Route::PUT('/billKind/{billKind}/update','BillKindController@update')->name('billKind.update');
Route::get('/billKind/{billKind}/destroy','BillKindController@destroy')->name('billKind.destroy');


Route::get('/table','TableController@index')->name('table.home');
Route::get('/table/create','TableController@create')->name('table.create');
Route::POST('/table/create','TableController@store')->name('table.store');
Route::get('/table/{table}/edit','TableController@edit')->name('table.edit');
Route::PUT('/table/{table}/update','TableController@update')->name('table.update');
Route::get('/table/{table}/destroy','TableController@destroy')->name('table.destroy'); 


Route::get('/tableReserve','TableReserveController@index')->name('tableReserve.home');
Route::get('/tableReserve/create','TableReserveController@create')->name('tableReserve.create');
Route::POST('/tableReserve/create','TableReserveController@store')->name('tableReserve.store');
Route::get('/tableReserve/{tableReserve}/edit','TableReserveController@edit')->name('tableReserve.edit');
Route::PUT('/tableReserve/{tableReserve}/update','TableReserveController@update')->name('tableReserve.update');
Route::get('/tableReserve/{tableReserve}/destroy','TableReserveController@destroy')->name('tableReserve.destroy'); 


Route::get('/voidOrder','voidOrderController@index')->name('voidOrder.home');
Route::get('/voidOrder/create','voidOrderController@create')->name('voidOrder.create');
Route::POST('/voidOrder/create','voidOrderController@store')->name('voidOrder.store');
Route::get('/voidOrder/{voidOrder}/edit','voidOrderController@edit')->name('voidOrder.edit');
Route::PUT('/voidOrder/{voidOrder}/update','voidOrderController@update')->name('voidOrder.update');
Route::get('/voidOrder/{voidOrder}/destroy','voidOrderController@destroy')->name('voidOrder.destroy');  


Route::get('/timeEvent','TimeEventController@index')->name('timeEvent.home');
Route::get('/timeEvent/create','TimeEventController@create')->name('timeEvent.create');
Route::POST('/timeEvent/create','TimeEventController@store')->name('timeEvent.store');
Route::get('/timeEvent/{timeEvent}/edit','TimeEventController@edit')->name('timeEvent.edit');
Route::PUT('/timeEvent/{timeEvent}/update','TimeEventController@update')->name('timeEvent.update');
Route::get('/timeEvent/{timeEvent}/destroy','TimeEventController@destroy')->name('timeEvent.destroy');



Route::get('/printer','PrinterController@index')->name('printer.home');
Route::get('/printer/create','PrinterController@create')->name('printer.create');
Route::POST('/printer/create','PrinterController@store')->name('printer.store');
Route::get('/printer/{printer}/edit','PrinterController@edit')->name('printer.edit');
Route::PUT('/printer/{printer}/update','PrinterController@update')->name('printer.update');
Route::get('/printer/{printer}/destroy','PrinterController@destroy')->name('printer.destroy');

Route::get('/payment','PaymentController@index')->name('payment.home');
Route::get('/payment/create','PaymentController@create')->name('payment.create');
Route::POST('/payment/create','PaymentController@store')->name('payment.store');
Route::get('/payment/{payment}/edit','PaymentController@edit')->name('payment.edit');
Route::PUT('/payment/{payment}/update','PaymentController@update')->name('payment.update');
Route::get('/payment/{payment}/destroy','PaymentController@destroy')->name('payment.destroy');

 
Route::get('/trans','TransController@index')->name('trans.home');
Route::get('/trans/create','TransController@create')->name('trans.create');
Route::POST('/trans/create','TransController@store')->name('trans.store');
Route::get('/trans/{trans}/edit','TransController@edit')->name('trans.edit');
Route::PUT('/trans/{trans}/update','TransController@update')->name('trans.update');
Route::get('/trans/{trans}/destroy','TransController@destroy')->name('trans.destroy');


Route::get('/permissions', 'PermissionController@index')->name('permissions.index');
Route::get('/permissions/create', 'PermissionController@create')->name('permissions.create');
Route::POST('/permissions/create', 'PermissionController@store')->name('permissions.store');
Route::get('/permissions/{id}/edit', 'PermissionController@edit')->name('permissions.edit');
Route::PUT('/permissions/{id}/update', 'PermissionController@update')->name('permissions.update');
Route::delete('/permissions/{id}/destroy', 'PermissionController@destroy')->name('permissions.destroy');
  
Route::get('/employees', 'EmployeeController@index')->name('employees.index');
Route::get('/employees/create', 'EmployeeController@create')->name('employees.create');
Route::POST('/employees/create', 'EmployeeController@store')->name('employees.store');
Route::get('/employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
Route::PUT('/employees/{employee}/update', 'EmployeeController@update')->name('employees.update');
Route::delete('/employees/{employee}/destroy', 'EmployeeController@destroy')->name('employees.destroy');
 
Route::get('/roles', 'RoleController@index')->name('roles.index');
Route::get('/roles/create', 'RoleController@create')->name('roles.create');
Route::POST('/roles/create', 'RoleController@store')->name('roles.store');
Route::get('/roles/{id}/edit', 'RoleController@edit')->name('roles.edit');
Route::PUT('/roles/{id}/update', 'RoleController@update')->name('roles.update');
Route::delete('/roles/{id}/destroy', 'RoleController@destroy')->name('roles.destroy');


// Starts reports rourtes 
Route::prefix('/reports')->middleware('auth')->group(function () {
    Route::get('/daily-orders', 'ReportsController@dailyOrders')->name('reports.dailyOrders');
    Route::post('/daily-orders', 'ReportsController@dailyOrdersResponse')->name('reports.dailyOrdersResponse');
    Route::post('/order-data', 'ReportsController@drawOrdersTable')->name('reports.drawOrdersTable');
    Route::get('/products-sales', 'ReportsController@productsSales')->name('reports.productsSales');
    Route::post('/products-sales', 'ReportsController@productsSalesResponse')->name('reports.productsSalesResponse');
    Route::get('/categories-sales', 'ReportsController@categoriesSales')->name('reports.categoriesSales');
    Route::post('/categories-sales', 'ReportsController@categoriesSalesResponse')->name('reports.categoriesSalesResponse');
    Route::get('/total-sales', 'ReportsController@totalSales')->name('reports.totalSales');
    Route::post('/total-sales', 'ReportsController@totalSalesResponse')->name('reports.totalSalesResponse');
    Route::get('/ingredients-sales', 'ReportsController@ingredientsSales')->name('reports.ingredientsSales');
    Route::post('/ingredients-sales', 'ReportsController@ingredientsSalesResponse')->name('reports.ingredientsSalesResponse');
    Route::post('/log-data', 'ReportsController@drawLogTable')->name('reports.drawLogTable');
    Route::get('/log', 'ReportsController@log')->name('reports.log');
    Route::post('/log', 'ReportsController@logResponse')->name('reports.logResponse');
    Route::get('/branches/{id}/floors', 'ReportsController@getFloors');
    Route::get('/branches/{id}/employees', 'ReportsController@getBranchEmployees');
    Route::get('/floors/{id}/employees', 'ReportsController@getFloorEmployees');
    Route::get('/floors/{id}/tables', 'ReportsController@getTables');
    Route::get('/categories/{id}/products', 'ReportsController@getProducts');
});

// End reports rourtes 