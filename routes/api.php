<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Koscode Backend';
});

Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'service', 'as' => 'service.'], function () {
        Route::get('/update/{uuid}', [\App\Http\Controllers\API\ServiceController::class, 'update']);
        Route::get('/show/{uuid}', [\App\Http\Controllers\API\ServiceController::class, 'show']);
    });
    Route::group(['prefix' => 'customer', 'as' => 'customer.'], function () {
        Route::get('/update/{uuid}', [\App\Http\Controllers\API\CustomerController::class, 'update']);
        Route::get('/show/{uuid}', [\App\Http\Controllers\API\CustomerController::class, 'show']);
    });
    Route::delete('logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
});

Route::get('/service', [\App\Http\Controllers\API\ServiceController::class, 'index']);
Route::get('/customer', [\App\Http\Controllers\API\CustomerController::class, 'index']);

Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
