<?php

use App\Models\Role;
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

#region Public URL - s
Route::get('/countries', ["uses" => "Api\CountryController", "as" => "countries"]);
#endregion

Route::group(['prefix' => 'admin', ['middleware' => ['auth:airlock']], "namespace" => "Admin\Api", "as" => "admin."], function() {
    Route::apiResource("/users", "UserController");
    Route::apiResource("/categories", "CategoryController");                                       // Get Categories
    Route::post("/users/{user}", ["uses" => "UserController@update", "as" => "users.account"]);                                         // Update with Avatar
});


Route::group(['middleware' => ['auth:airlock']], function() {
    Route::get('/user', function (Request $request) {
        return response()->json(['user' => $request->user()], 200);
    })->name("user");
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');
});


Route::group(['middleware' => 'guest'], function() {
    Route::post("/register", ["uses" => "Auth\RegisterController@register", "as" => "register"]);
    Route::post("/login", ["uses" => "Auth\LoginController@token", "as" => "login"]);
    Route::post('/password/email', ["uses" => "Auth\ForgotPasswordController@apiSendResetLinkEmail", "as" => "password.email"]);
    Route::post('/password/reset', ["uses" => "Auth\ResetPasswordController@apiReset", "as" => "password.update"]);
});

// Route::group(['airlock' => 'auth', 'middleware' => 'auth:airlock', 'namespace' => 'Auth'], function() {
    // Route::post("/register", ["uses" => "RegisterController@register", "as" => ".register"]);
// });


Route::get('/role/{role:slug}', function (Role $role) {
    return $role->users()->select("email")->get();
});
