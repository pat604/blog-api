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

/*
Route::middleware('web')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Auth::routes();
    });
*/


// you may use the  apiResource method to automatically exclude these two routes (edit, create)

// 'except' not working


Route::group([
    'middleware' => 'auth:api'
    ] ,function () {
    // Route::get('/', 'PostController@index')->name('home');
    Route::apiResource('posts', 'PostController');
    Route::apiResource('posts.comments', 'CommentController', ['only' => ['index', 'destroy', 'store']]);

});
