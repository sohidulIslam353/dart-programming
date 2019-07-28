<?php



Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::apiResource('/employee','Api\EmployeeController');
Route::apiResource('/supplier','Api\SupplierController');
Route::apiResource('/category','Api\CategoryController');
Route::apiResource('/product','Api\ProductController');
Route::apiResource('/expense','Api\ExpenseController');
Route::apiResource('/customer','Api\CustomerController');

Route::Post('/salary/paid/{id}','Api\SalaryController@Paid');
Route::Get('/salary','Api\SalaryController@AllSalary');
Route::Get('/salary/view/{id}','Api\SalaryController@ViewSalary');
Route::Get('/edit/salary/{id}','Api\SalaryController@EditSalary');
Route::Post('/salary/update/{id}','Api\SalaryController@SalaryUpdate');
Route::Post('/stock/update/{id}','Api\SalaryController@StockUpdate');

Route::get('/getting/product/{id}','Api\PosController@GetProduct');

Route::get('/addTocart/{id}','Api\CartController@AddToCart');
Route::get('/cart/product','Api\CartController@CartProduct');
Route::get('/remove/cart/{id}','Api\CartController@removeCart');
Route::get('/increment/{id}','Api\CartController@Increment');
Route::get('/decrement/{id}','Api\CartController@Decrement');
Route::get('/vats','Api\CartController@Vats');

Route::post('/orderdone','Api\PosController@OrderDone');

Route::get('/orders','Api\OrderController@TodayOrder');
Route::get('/order/details/{id}','Api\OrderController@OrderDetails');
Route::get('/order/orderdetails/{id}','Api\OrderController@OrderDetailsAll');
Route::post('/search/order/','Api\OrderController@SearchOrderDate');
Route::post('/search/month/','Api\OrderController@SearchMonth');