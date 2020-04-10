<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#region Public URL - s
Route::get('/countries', ["uses" => "Api\CountryController", "as" => "countries"]);
#endregion

// Admin
Route::group(['prefix' => 'admin', ['middleware' => ['auth:airlock']], "namespace" => "Admin\Api", "as" => "admin."], function() {
    Route::apiResource("/users", "UserController");
    Route::apiResource("/categories", "CategoryController", ["parameters" => ["categories" => "category"]]);                                                                            // Get Categories
    Route::post("/users/{user}", ["uses" => "UserController@update", "as" => "users.account"]);                                         // Update with Avatar
});

// Users
Route::group(['middleware' => ['auth:airlock']], function() {
    Route::get('/user', function (Request $request) {
        return response()->json(['user' => $request->user()], 200);
    })->name("user");
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});

// Guests
Route::group(['middleware' => 'guest'], function() {
    Route::post("/register", ["uses" => "Auth\RegisterController@apiRegister", "as" => "register"]);
    Route::post("/login", ["uses" => "Auth\LoginController@token", "as" => "login"]);
    Route::post('/password/email', ["uses" => "Auth\ForgotPasswordController@apiSendResetLinkEmail", "as" => "password.email"]);
    Route::post('/password/reset', ["uses" => "Auth\ResetPasswordController@apiReset", "as" => "password.update"]);
});
