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


// you may use the  apiResource method to automatically exclude these two routes (edit, create)

/*
Route::middleware('web')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Auth::routes();
    });
*/

// Auth::routes();


Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('posts', 'PostController');
    Route::apiResource('posts.comments', 'CommentController', ['except' => ['update', 'show']]);

});

/*
// Authentication Routes...
Route::get('login', 'Auth\AuthController@showLoginForm');
Route::post('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Password Reset Routes...
Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
Route::post('password/reset', 'Auth\PasswordController@reset');

*/


