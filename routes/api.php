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
// returning visitors data
Route::get('json/visitors/unique','Api\VisitorController@get')->name('unique-visitors');
// return url hits
Route::get('json/hits','Api\UrlController@hits')->name('url-hits');
// return top hits for visitors and url
Route::get('json/hits/top','Api\UrlController@top')->name('top-hits');
