<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::group(['prefix' => 'admin', "namespace" => "Admin\Api", "as" => "admin."], function() {
    Route::apiResource("/users", "UserController");
    Route::post("/users/{user}", ["uses" => "UserController@update", "as" => "users.account"]);                                          // Update with Avatar
});

Route::post("/register", ["uses" => "Auth\RegisterController@register", "as" => "register"]);
Route::post("/login", ["uses" => "Auth\LoginController@login", "as" => "login"]);
// Route::group(['airlock' => 'auth', 'middleware' => 'auth:airlock', 'namespace' => 'Auth'], function() {
    // Route::post("/register", ["uses" => "RegisterController@register", "as" => ".register"]);
// });

