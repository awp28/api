<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CitizenController;
use App\Http\Controllers\Api\ResourceController;
use App\Http\Controllers\Api\UserController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['prefix' => 'v1', 'middleware' => 'api'], function ($router) {

    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/auth/get-info', [AuthController::class, 'me']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::apiResource('/users', UserController::class);
        Route::apiResource('/citizens', CitizenController::class);

        Route::group(['prefix' => 'resources'], function () {
            Route::controller(ResourceController::class)->group(function () {
                Route::get('/regions', 'regions');
                Route::get('/cities', 'cities');
            });
        });


        Route::post('/logout', [AuthController::class, 'logout']);
    });

});
