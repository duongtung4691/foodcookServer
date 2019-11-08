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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResource('posts', 'API\PostController');
Route::prefix('v1')->group(function(){
    Route::post('login', 'API\LoginSignUpController@login');
    Route::post('register', 'API\LoginSignUpController@register');
    Route::group(['middleware' => 'api'], function(){
        Route::get('getUser', 'API\LoginSignUpController@user');
        Route::post('logout', 'API\LoginSignUpController@logout');
    });
});
