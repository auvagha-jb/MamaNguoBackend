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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Users
Route::get('allUsers', 'UsersController@allUsers');
Route::get('getAvailableMamaNguo', 'UsersController@getAvailableMamaNguo');
Route::post('newUser', 'UsersController@storeUser');
Route::post('newMamaNguo', 'UsersController@storeMamaNguo');

//Ratings
Route::post('addRating', 'RatingsController@addRating');

//Role
Route::post('addRole', 'RolesController@addRole');
