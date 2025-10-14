<?php

use App\Http\Controllers\API\AttendanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;

Route::prefix('v1')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::get('get-attendance-today', [AttendanceController::class, 'getAttendanceToday']);
        Route::get('get-schedule', [AttendanceController::class, 'getSchedule']);
        Route::post('store-attendance', [AttendanceController::class, 'store']);
    });
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
