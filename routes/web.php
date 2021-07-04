<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', '\App\Http\Controllers\HomeController@home');
Route::get('coin_detail_{id}', '\App\Http\Controllers\HomeController@coinDetail');
Route::get('/listing','\App\Http\Controllers\HomeController@listing');


Route::middleware('guest')->group(function ()
{
    Route::get('sign_up', '\App\Http\Controllers\HomeController@signUp');
    Route::post('sign_up', '\App\Http\Controllers\HomeController@postSignUp');
    Route::get('login', '\App\Http\Controllers\HomeController@login')->name('login');
    Route::post('login', '\App\Http\Controllers\HomeController@postLogin');

});

Route::middleware('auth')->group(function ()
{
    Route::get('home','\App\Http\Controllers\UserController@home');
    Route::get('banner','\App\Http\Controllers\UserController@banner');
    Route::post('banner','\App\Http\Controllers\UserController@post_banner');
    Route::get('add_coin','\App\Http\Controllers\UserController@addCoin');
    Route::get('favourites','\App\Http\Controllers\UserController@favourites');
    Route::post('add_coin','\App\Http\Controllers\UserController@postAddCoin');
    Route::get('favourite/{id}','\App\Http\Controllers\HomeController@favourite');

    // coin options 
    Route::get('delete_coin/{id}','\App\Http\Controllers\UserController@deleteCoin');
   Route::get('promote/{id}','\App\Http\Controllers\UserController@promoteCoin');
   Route::get('verify/{id}','\App\Http\Controllers\UserController@verifyCoin');
   Route::get('best/{id}','\App\Http\Controllers\UserController@bestCoin');

    Route::get('coin','\App\Http\Controllers\UserController@coin');
    Route::get('logout','\App\Http\Controllers\UserController@getLogout');
   
});

