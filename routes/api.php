<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

Route::delete('/orders/{order}', [OrderController::class, 'destroy']);

});

Route::put('/orders/{order}', [OrderController::class, 'update']);

// Route::put('/orders/{order}', [OrderController::class, 'update']);
//    Route::put('/orders/{order}', function (Request $request, \App\Models\Order $order) {

//     if ($user = User::find(1)) {
//         Auth::login($user);
//     }

//     return app(\App\Http\Controllers\OrderController::class)->update($request, $order);
// });
