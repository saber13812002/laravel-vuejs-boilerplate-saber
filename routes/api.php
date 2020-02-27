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


Route::get('v1/province', 'ProvinceController@index');
Route::get('v1/county/{id}', 'CountyController@index');
Route::get('v1/city/{id}', 'CityController@index');


Route::get('v1/otp11/{phone}', 'OtpController@otp11get');
Route::get('v1/otp22/{phone}/{code}', 'OtpController@otp22get');

Route::post('v1/formSubmit','ImageUploadController@formSubmit');

Route::post('v1/info/me',  'InfoController@me');