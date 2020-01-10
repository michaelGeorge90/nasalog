<?php

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

Route::get('/', function () {
    foreach(file('NASA_access_log_Jul95') as $line) {
         dd(explode(' ',$line));
    }
//    return explode(' ','199.72.81.55 - - [01/Jul/1995:00:00:01 -0400] "GET /history/apollo/ HTTP/1.0" 200 6245');
});

Route::get('from-file/{file}','LoggerController@buildFormFile');
