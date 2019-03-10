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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menuBar/aboutUs',function(){
	return view('menuBar.aboutUs');
});

Route::post('paypal', 'PaymentController@payWithPaypal')->name('payWithPaypal');
Route::get('status', 'PaymentController@getPaymentStatus')->name('status');

Route::get('/menuBar/menu', 'MenuController@index')->name('menu');
Route::get('/menuBar/orderOnline', 'OrderOnlineController@index')->name('orderOnline');
Route::get('/menuBar/location', 'LocationController@index')->name('location');
Route::get('/menuBar/contactUs', 'ContactUsController@index')->name('contactUs');

Route::get('/adminLogin','AdminController@adminLogin' )->name('adminLogin');
Route::post('/checkAdminLogin','AdminController@checkAdminLogin' )->name('checkAdminLogin');
Route::get('/dashboard','AdminController@index' )->name('dashboard');
Route::get('/customerInfo','AdminController@getCustomerInfo' )->name('customerInfo');
Route::get('/salesReport','AdminController@getSalesReport' )->name('salesReport');
Route::get('/productsReport','AdminController@getProductsReport' )->name('productsReport');
Route::get('/stocks','AdminController@getStocks' )->name('stocks');
Route::get('/stocksDetails','AdminController@getStocksDetails' )->name('stocksDetails');

Route::post('/addStock','AdminController@addStock' )->name('addStock');
Route::post('/updateStock/{id}','AdminController@updateStock' )->name('updateStock');
Route::get('/editStocksDetails/{id}','AdminController@getEditStocksDetails' )->name('editStocksDetails');
Route::get('/deleteStock/{id}','AdminController@deleteStock' )->name('deleteStock');

Route::get('/categories','AdminController@getCategories' )->name('categories');
Route::get('/orders','AdminController@getOrders' )->name('orders');
Route::post('/updateOrders/{id}','AdminController@updateOrders' )->name('updateOrders');
Route::get('/orderDetails/{id}','AdminController@orderDetails' )->name('orderDetails');

Route::get('/productDetails/{id}', 'OrderOnlineController@getProduct')->name('productDetails');
Route::get('/addCartItem/{id}/{uid}', 'OrderOnlineController@addCartItem')->name('addCartItem');
Route::get('/shoppingCart', 'OrderOnlineController@getShoppingCart')->name('shoppingCart');
Route::get('/deleteCartItem/{id}', 'OrderOnlineController@deleteCartItem')->name('deleteCartItem');
Route::get('/customCake/{id}', 'OrderOnlineController@getCustomCake')->name('customCake');
Route::post('/updateCustomCake/{id}', 'OrderOnlineController@updateCustomCake')->name('updateCustomCake');
Route::get('/checkout', 'OrderOnlineController@getCheckout')->name('checkout');

Route::get('/editProfile/{id}', 'HomeController@editProfile')->name('editProfile');
Route::post('/updateProfile/{id}', 'HomeController@updateProfile')->name('updateProfile');
Route::get('/historyPurchase', 'HomeController@historyPurchase')->name('historyPurchase');
Route::get('/historyPurchaseDetails/{oid}', 'HomeController@historyPurchaseDetails')->name('historyPurchaseDetails');
Route::get('/trackOrder', 'HomeController@trackOrder')->name('trackOrder');
Route::get('/trackOrderDetails/{oid}', 'HomeController@trackOrderDetails')->name('trackOrderDetails');
