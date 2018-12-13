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

Route::get('test', function () {

    $test = array(
        "dette er fra laravel over wifi LAN" => "heisann",
        "bar" => "foo",
    );

    return $test;

});

Route::post('register', 'Detached\Auth\UserRegister@create');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
