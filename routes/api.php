<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

#region Public URL - s
Route::get('/countries', ["uses" => "Api\CountryController", "as" => "countries"]);
#endregion

// User Authentication
Route::group(["prefix" => "auth", "as" => "user."], function() {
    // Auth
    Route::post("/register",["uses" => "Auth\RegisterUserController@register", "as" => "register"]);
    Route::post("/login",   ["uses" => "Auth\LoginUserController@login", "as" => "login"]);
    Route::post("/refresh", ["uses" => "Auth\LoginUserController@refresh", "as" => "refresh"]);
    Route::post("/logout", ["uses" => "Auth\LoginUserController@logout", "as" => "logout"]);
    // Route::post("/reset_password", ["uses" => "Auth\PasswordUserController@sendResetLink", "as" => "sendResetLink"]);
    // Route::put("/change_password", ["uses" => "Auth\PasswordUserController@changePassword", "as" => "changePassword"]);
});

// User Cabinet
Route::group(["prefix" => "cabinet", "middleware" => "auth", "as" => "cabinet."], function() {
    Route::get("/", ["uses" => "UserController@me", "as" => "me"]);
});

// Admin Authentication
// Route::group(["prefix" => "admin", "namespace" => "Admin", "as" => "admin."], function() {
//     // Auth
//     Route::group(["prefix" => "auth"], function() {
//         Route::post("/register", ["uses" => "Auth\RegisterController@register", "as" => "register"]);
//         Route::post("/login", ["uses" => "Auth\LoginController@login", "as" => "login"]);
//         Route::post("/refresh", ["uses" => "Auth\LoginController@refresh", "as" => "refresh"]);
//         Route::post("/logout", ["uses" => "Auth\LoginController@logout", "as" => "logout"]);
//         Route::post("/reset_password", ["uses" => "Auth\PasswordController@sendResetLink", "as" => "sendResetLink"]);
//         Route::put("/change_password", ["uses" => "Auth\PasswordController@changePassword", "as" => "changePassword"]);
//     });

//     Route::get("/me", ["uses" => "AdminController@me", "as" => "me"]);
// });

// Route::get('/role/{role:slug}', function (Role $role) {
//     return $role->users()->select("email")->get();
// });
