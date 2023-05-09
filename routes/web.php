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

Route::get('', 'SpController@ab');

Route::get('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@getLogin']);
Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@postLogin']);
Route::get('/logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@getlogout']);
Route::get('/signup', ['as' => 'signup', 'uses' => 'Auth\LoginController@getSignup']);
Route::post('/signup', ['as' => 'signup', 'uses' => 'Auth\LoginController@postSignup']);

Route::middleware(['auth'])->group(function () {
    // route client
    Route::get('change-account', 'Client\AccountController@index')->name('Change_account');
   // Route::get('/check', 'Client\ProductController@check');
    Route::get('/', 'Client\ProductController@home');
    Route::get('san-pham/{id}', 'Client\ProductController@detail')->name('route_Fe_Ctsp');
    Route::get('/store', 'Client\ProductController@store');
    Route::get('danh-muc/{id}', 'Client\ProductController@product_dm')->name('route_Fe_dmsp');
    // Route::get('/check-out', 'CheckoutController@index');
    Route::get('/search', 'Client\ProductController@search')->name('route_tim_kiem');
    Route::get('/thap-cao', 'Client\ProductController@min')->name('asc');
    Route::get('/cao-thap', 'Client\ProductController@max')->name('desc');

    /* Comment */ 
    Route::post('comment', 'Client\CommentController@store')->name('comment');
    Route::get('comment/{id}', 'Client\CommentController@destroy')->name('delete');

    /* Cart */
    Route::get('cart-list','Client\CartController@cartList')->name('cartList');
    Route::post('add-to-cart/{product}', 'Client\CartController@addToCart')->name('addToCart');
    Route::get('/cart/remove/{id}', 'Client\CartController@destroy')->name('cart_delete');
    Route::get('checkout', 'Client\CartController@checkout')->name('check');
    Route::post('/discount/check', 'Client\DiscountController@checkDiscount')->name('discount_check');




    //route Admin 
    Route::prefix('admin')->group(function () {
        Route::get('nguoidung', 'Admin\UsersController@index')->name('route_BackEnd_Uesr_Index');
        Route::match(['get', 'post'], 'users/add', 'Admin\UsersController@add')->name('route_BackEnd_Uesr_Add');
        Route::get('nguoidung/detail/{id}', 'Admin\UsersController@detailNd')->name('route_BackEnd_Uesr_detail');
        Route::post('nguoidung/update/{id}', 'Admin\UsersController@updateNd')->name('route_BackEnd_Uesr_update');
        Route::get('/nguoidung/delete/{id}', 'Admin\UsersController@destroy')->name('route_BackEnd_Uesr_del');

        Route::get('danhmuc', 'Admin\DmController@index')->name('route_BackEnd_Danhmuc_Index');
        Route::match(['get', 'post'], 'danhmuc/add', 'Admin\DmController@add')->name('route_BackEnd_Danhmuc_Add');
        Route::get('danhmuc/delete/{id}', 'Admin\DmController@destroy')->name('route_BackEnd_Danhmuc_del');
        Route::get('danhmuc/detail/{id}', 'Admin\DmController@detailDm')->name('route_BackEnd_Danhmuc_detail');
        Route::post('danhmuc/detail/{id}', 'Admin\DmController@updateDm')->name('route_BackEnd_Danhmuc_update');

        Route::get('banner', 'Admin\BannerContrller@index')->name('route_BackEnd_Banner_Index');
        Route::match(['get', 'post'], 'banner/add', 'Admin\BannerContrller@add')->name('route_BackEnd_Banner_Add');
        Route::get('banner/detail/{id}', 'Admin\BannerContrller@detailBaner')->name('route_BackEnd_Banner_detail');
        Route::post('banner/update/{id}', 'Admin\BannerContrller@updatebanner')->name('route_BackEnd_Banner_update');
        Route::get('/banner/delete/{id}', 'Admin\BannerContrller@destroy')->name('route_BackEnd_Banner_del');

        Route::get('sanpham', 'Admin\spController@index')->name('route_BackEnd_Sanpham_Index');
        Route::match(['get', 'post'], 'sanpham/add', 'Admin\spController@add')->name('route_BackEnd_Sanpham_Add');
        Route::get('sanpham/detail/{id}', 'Admin\spController@detailSp')->name('route_BackEnd_Sanpham_detail');
        Route::post('sanpham/update/{id}', 'Admin\spController@updateSp')->name('route_BackEnd_Sanpham_update');
        Route::get('sanpham/delete/{id}', 'Admin\spController@destroy')->name('route_BackEnd_Sanpham_del');

        Route::get('discount', 'Admin\DiscountController@index')->name('admin_discount');
        Route::get('discount/add', 'Admin\DiscountController@create')->name('admin_add_discount');
        Route::post('discount/add', 'Admin\DiscountController@store')->name('admin_create_discount');
        Route::get('/discount/show/{id}', 'Admin\DiscountController@edit')->name('admin_edit_discount');
        Route::put('/discount/update/{id}', 'Admin\DiscountController@update')->name('admin_update_discount');
        Route::get('discount/delete/{id}', 'Admin\DiscountController@destroy')->name('admin_discount_del');
    });
});
