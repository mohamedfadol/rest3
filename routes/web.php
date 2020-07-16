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

//         Artisan::call('config:cache');
//         Artisan::call('cache:clear');
//   return "Cache is cleared";
}); 

Auth::routes();    

// Start LaravelLocalization Admin Route Group For Aurages Panel
    Route::group(
[   'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ //...

// Start LaravelLocalization Admin Route Group For Aurages Panel

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

}); //  End LaravelLocalization

    Route::get('/logout','Auth\LoginController@logout')->name('logout');

// Start LaravelLocalization branch rourtes 
Route::group(
[   'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ //...

    // logout for a user Separated from logout of defaulte loginController But Still Work the defaulte login
    Route::resource('/branch','BranchController');
    Route::resource('/floor','FloorController');
    Route::resource('/category','CategoryController');
    Route::resource('/menu','MenuController');
    Route::resource('/product','ProductController');
    Route::resource('/class','ClassProductController');
    Route::resource('/modifire','ModifireController');
    Route::resource('/ingredient','IngredientController'); 
    Route::resource('/customer','CustomerController');
    Route::resource('/discount','DiscountController');
    Route::resource('/giftcard','GiftCardController');
    Route::resource('/billKind','BillKindController'); 
    Route::resource('/table','TableController');
    Route::resource('/tableReserve','TableReserveController'); 
    Route::resource('/voidOrder','voidOrderController');
    Route::resource('/timeEvent','TimeEventController');
    Route::resource('/printer','PrinterController');
    Route::resource('/payment','PaymentController'); 
    Route::resource('/trans','TransController');
    Route::resource('/permissions', 'PermissionController');
    Route::resource('/employees', 'EmployeeController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/delevery', 'DeleveryController');
}); // end LaravelLocalization all branch panel rourtes 




// End delevery rourtes 

// Start LaravelLocalization branch rourtes 
Route::group(
[   'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ //...

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
});