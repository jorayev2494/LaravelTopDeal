<?php

use Illuminate\Support\Facades\Route;

#region Public URL - s
Route::get('/countries', ["uses" => "CountryController", "as" => "countries"]);
#endregion


// User Authentication
Route::group(["prefix" => "auth", "as" => "auth."], function() {
    // Auth
    Route::post("/register",["uses" => "Auth\RegisterUserController@register", "as" => "register"]);
    Route::post("/login",   ["uses" => "Auth\LoginUserController@login", "as" => "login"]);
    Route::post("/refresh", ["uses" => "Auth\LoginUserController@refresh", "as" => "refresh"]);
    Route::post("/logout", ["uses" => "Auth\LoginUserController@logout", "as" => "logout"]);
    Route::post("/reset_password", ["uses" => "Auth\PasswordUserController@sendResetLink", "as" => "sendResetLink"]);
    Route::put("/change_password", ["uses" => "Auth\PasswordUserController@changePassword", "as" => "changePassword"]);
});

// #region User Routes
Route::group(['middleware' => 'auth:user', "as" => "user."], function() {
    // #region User Cabinet
    Route::group(["prefix" => "cabinet", "as" => "cabinet."], function() {
        Route::get("/", ["uses" => "UserController@me", "as" => "me"]);
    });
    // #endregion
});
// #endregion

// Admin Routes
Route::group(["prefix" => "admin", "as" => "admin."], function() {
    // Auth
    Route::group(["prefix" => "auth", "as" => "auth."], function() {
        Route::post("/register", ["uses" => "Admin\Auth\RegisterController@register", "as" => "register"]);
        Route::post("/login", ["uses" => "Admin\Auth\LoginController@login", "as" => "login"]);
        Route::post("/refresh", ["uses" => "Admin\Auth\LoginController@refresh", "as" => "refresh"]);
        Route::post("/logout", ["uses" => "Admin\Auth\LoginController@logout", "as" => "logout"]);
        Route::post("/reset_password", ["uses" => "Admin\Auth\PasswordController@sendResetLink", "as" => "sendResetLink"]);
        Route::put("/change_password", ["uses" => "Admin\Auth\PasswordController@changePassword", "as" => "changePassword"]);
    });

    // Admin Authenticate Routes
    Route::group(['middleware' => 'auth:admin'], function() {
        Route::get("/me", ["uses" => "Admin\AdminController@me", "as" => "me"]);
        Route::apiResource("/users", "Admin\UserController");
        Route::post("/users/{user}", ["uses" => "Admin\UserController@update", "as" => "user_account_avatar"]);
    });
    
});

// Route::get('/role/{role:slug}', function (Role $role) {
//     return $role->users()->select("email")->get();
// });
