<?php

use App\Livewire\Attendance;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'auth'], function () {
    Route::get('attandance', Attendance::class)->name('attandance');
});

Route::get('/', function () {
    return view('welcome');
});
