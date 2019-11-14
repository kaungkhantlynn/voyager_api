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

Route::get('divisions','Api\ApiController@getDivisions');
Route::get('divisions/{id}/schools','Api\ApiController@getSchoolsByDivision');
Route::get('schools/{id}','Api\ApiController@getSchool');
Route::get('schools','Api\ApiController@getSchoolsByResultRange');
