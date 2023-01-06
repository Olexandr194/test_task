<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Main\MainController::class, 'index'])->name('main');
Route::post('/check', [App\Http\Controllers\Main\MainController::class, 'check'])->name('check');

Auth::routes();


