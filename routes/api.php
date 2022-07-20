<?php

use App\Http\Controllers\Api\AuthController;
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

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
        Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
        Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::post('refresh', [App\Http\Controllers\Api\AuthController::class, 'refresh']);
        Route::post('me', [App\Http\Controllers\Api\AuthController::class, 'me']);
    });   
    Route::middleware('jwt.verify')->group(function () {
        Route::prefix('admin')->group(function () {
            Route::prefix('review')->group(function(){
                Route::get('/index', [App\Http\Controllers\Api\ReviewController::class, 'index']);
                Route::post('/store', [App\Http\Controllers\Api\ReviewController::class, 'store']);
                Route::get('/show', [App\Http\Controllers\Api\ReviewController::class, 'show']);
                Route::put('/update', [App\Http\Controllers\Api\ReviewController::class, 'update']);
                Route::delete('/delete', [App\Http\Controllers\Api\ReviewController::class, 'destroy']);
            });
           
        });   
    });
    Route::middleware('guest')->group(function () {
        Route::prefix('public')->group(function () {
            Route::prefix('review')->group(function(){
                Route::get('/index', [App\Http\Controllers\Api\GuestController::class, 'index']);
                Route::get('/show', [App\Http\Controllers\Api\GuestController::class, 'show']);
            });
           
        });   
    });

});



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
