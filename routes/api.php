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

Route::put('/orders/{order}', [OrderController::class, 'update']);

Route::delete('/orders/{order}', [OrderController::class, 'destroy']);

});
// Route::get('/fix-user', function() {
//     $user = \App\Models\User::where('email', 'user@example.com')->first();
//     if ($user) {
//         $user->update(['password' => \Illuminate\Support\Facades\Hash::make('12121212')]);
//         return "تم تحديث كلمة المرور بنجاح إلى 12121212";
//     }
//     return "المستخدم غير موجود";
// });
//    Route::put('/orders/{order}', function (Request $request, \App\Models\Order $order) {

//     if ($user = User::find(1)) {
//         Auth::login($user);
//     }

//     return app(\App\Http\Controllers\OrderController::class)->update($request, $order);
// });
