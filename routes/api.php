<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#region Public URL - s
Route::get('/countries', ["uses" => "Api\CountryController", "as" => "countries"]);
#endregion

// Route::group(['prefix' => 'admin', ['middleware' => ['auth:airlock']], "namespace" => "Admin", "as" => "admin."], function() {
//     Route::apiResource("/users", "UserController");
//     Route::apiResource("/categories", "CategoryController");                                       // Get Categories
//     Route::post("/users/{user}", ["uses" => "UserController@update", "as" => "users.account"]);                                         // Update with Avatar
// });

// Admin Authentication
Route::group(["prefix" => "admin", "namespace" => "Admin", "as" => "admin."], function() {
    // Auth
    Route::group(["prefix" => "auth"], function() {
        Route::post("/register", ["uses" => "Auth\RegisterController@register", "as" => "register"]);
        Route::post("/login", ["uses" => "Auth\LoginController@login", "as" => "login"]);
        Route::post("/refresh", ["uses" => "Auth\LoginController@refresh", "as" => "refresh"]);
        Route::post("/logout", ["uses" => "Auth\LoginController@logout", "as" => "logout"]);
    });

    Route::get("/me", ["uses" => "AdminController@me", "as" => "me"]);
    // Route::post('/password/email', ["uses" => "Auth\ForgotPasswordController@apiSendResetLinkEmail", "as" => "password.email"]);
    // Route::post('/password/reset', ["uses" => "Auth\ResetPasswordController@apiReset", "as" => "password.update"]);
});

// Route::get('/role/{role:slug}', function (Role $role) {
//     return $role->users()->select("email")->get();
// });
