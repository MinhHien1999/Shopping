<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => '/admin'], function () {
    Route::get('/', 'AdminController@getLogin' );
    Route::post('/dashboard','AdminController@Login');
    Route::get('/dashboard','AdminController@getDashboard');
    Route::get('/logout', 'AdminController@logout' );
        //category
    Route::group(['prefix' => 'nsx'], function () {
        Route::post('/save', 'AdminController@saveNsx');
        Route::get('/', 'AdminController@getNsxList');
        Route::get('/add', 'AdminController@getNsxAdd');
        Route::get('/edit/{id_nsx}', 'AdminController@getNsxEdit');
        Route::post('/update', 'AdminController@editNsx');
        Route::get('/delete/{id_nsx}','AdminController@deleteNsx');
        Route::get('/search', 'AdminController@SearchNsx');
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('/', 'AdminController@getProductList');
        Route::get('/add', 'AdminController@getProductAdd');
        Route::post('/save','AdminController@saveProduct');
        Route::get('/detail/{id_sanpham}', 'AdminController@getProductDetail');
        Route::post('/detail/save','AdminController@saveProductDetail');
        Route::get('/edit/{id_sanpham}', 'AdminController@getProductEdit');
        Route::post('/update','AdminController@editProduct');
        Route::get('/delete/{id_sanpham}','AdminController@deleteProduct');
        Route::get('/search', 'AdminController@SearchProduct');
    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('/','AdminController@getSlideList');
        Route::get('/add','AdminController@getSlideAdd');
        Route::post('/save','AdminController@saveSlide');
        Route::get('/edit/{id_slide}','AdminController@getSlideEdit');
        Route::post('/update', 'AdminController@editSlide');
        Route::get('delete/{slideId}', 'AdminController@deleteSlide');
    });
    Route::group(['prefix' => 'order'], function () {
        Route::get('manage-order','AdminController@getOrderList');
        Route::get('view-order/{orderId}','AdminController@getOrderView');
        Route::post('order-status', 'AdminController@orderStatusEdit');
    });
    Route::group(['prefix' => 'statistic'], function () {
        route::get('/','AdminController@getStatisticList');
    });
    Route::group(['prefix' => 'member'], function () {
        Route::get('/','AdminController@getMemberList');
    });
});

// Client
Route::get('/', 'ClientController@index');
Route::get('/nsx/{id_nsx}', 'ClientController@getProductNsx');
Route::get('/product', 'ClientController@getProductAll');
Route::get('/product/{id_sp}', 'ClientController@getProductDetail');
Route::get('/cart', 'ClientController@getCart');
Route::get('/search', 'ClientController@Search');
Route::get('/signup', 'ClientController@getSignUp');
Route::post('/sign-up', 'ClientController@addCustomer');
Route::post('/log-in', 'ClientController@loginCustomer');
Route::get('/info/{id}', 'ClientController@getInfoCustomer');
Route::post('/info-update', 'ClientController@updateCustomer');
Route::get('/customer-order/{id}', 'ClientController@orderCustomer');
Route::get('/customer-order-detail/{id_kh}/{id_hoadon}', 'ClientController@orderDetailsCustomer');
Route::get('/log-out', 'ClientController@logoutCustomer');
Route::get('/checkout', 'ClientController@getCheckOut');
// Cart
Route::post('/add-to-cart', 'CartController@addCart')->name('add-cart-ajax');
Route::post('/delete-to-cart', 'CartController@deleteCart')->name('delete-cart-ajax');
Route::post('/cart/update', 'CartController@updateCart');
Route::post('/checkout', 'CartController@CheckOut');
// Route::get('/', function () {
//     return view('welcome');
// });
