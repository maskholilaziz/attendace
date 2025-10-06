<?php

use App\Livewire\Attendance;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('attendance', Attendance::class)->name('attendance');
});

Route::get('/', function () {
    return view('welcome');
});
