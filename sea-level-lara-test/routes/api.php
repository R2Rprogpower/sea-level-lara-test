<?php

use App\Http\Controllers\Api\V1\CustomerController;
use App\Http\Controllers\Api\V1\ShipmentController;
use App\Http\Controllers\Api\V1\ProductController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers\Api\V1', 'middleware' => 'auth:sanctum'], function() {

    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('shipments', ShipmentController::class);
    Route::apiResource('products', ProductController::class);

    Route::post('/shipments/send', [ShipmentController::class, 'sendShipment']);
});

