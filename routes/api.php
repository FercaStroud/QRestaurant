<?php

use App\Category;
use App\Menu;
use App\Product;
use App\User;
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

Route::group(['middleware' => 'api', 'namespace' => 'Auth',], function () {
    Route::post('login', 'LoginController@login');
    Route::post('logout', 'LoginController@logout');

    Route::post('register', 'RegisterController@register');
});

Route::group(['middleware' => ['auth:sanctum'],], function () {
    Route::get('vue', 'HomeController@vue');
    Route::post('user', 'HomeController@user');

    Route::post('settings', 'SettingController@saveSettings');

    Route::group(['prefix' => 'payments'], function () {
        Route::post('status', 'PaymentController@getServiceStatus');
    });

    Route::resource('categories', 'Resources\CategoryController', ['except' => ['create', 'edit', 'show'],]);
    Route::resource('products', 'Resources\ProductController', ['except' => ['create', 'edit', 'show'],]);
    Route::resource('menus', 'Resources\MenuController', ['except' => ['create', 'edit', 'show'],]);
    Route::post('menus/add/file', 'Resources\MenuController@addFile');
    Route::post('category/add/file', 'Resources\CategoryController@addFile');
    Route::post('product/add/file', 'Resources\ProductController@addFile');
    Route::post('user/update', 'Resources\UserController@updateUserByClient');
    Route::post('user/update/cover', 'Resources\UserController@updateCover');
    Route::post('user/update/logo', 'Resources\UserController@updateLogo');


    Route::post('checkout', 'PaymentController@preference');
    Route::get('get/user/payments', 'PaymentController@getByUserId');
    Route::get('get/user/payment/status', 'PaymentController@getUserStatus');
});

Route::group(['middleware' => ['admin'],], function () {
    Route::resource('users', 'Resources\UserController', ['except' => ['create', 'edit', 'show'],]);
});

Route::post('categories/withProducts', 'Resources\CategoryController@withProducts');

Route::get('checkout/feedback', 'PaymentController@feedback');
//Route::get('test', function () {
//    echo 'ok';
//});
