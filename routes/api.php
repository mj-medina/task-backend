<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
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

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::get('/getTask', '\App\Http\Controllers\TaskController@getTask');
    Route::post('/createTask', '\App\Http\Controllers\TaskController@createTask');
    Route::post('/editTask', '\App\Http\Controllers\TaskController@editTask');
    Route::post('/deleteTask', '\App\Http\Controllers\TaskController@deleteTask');
    Route::post('/markTask', '\App\Http\Controllers\TaskController@markTask');
});

Route::get('/token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

Route::post('/login', LoginController::class);
Route::post('/logout', LogoutController::class);
Route::post('/register', RegisterController::class);
