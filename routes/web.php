<?php

use App\Http\Controllers\GiftController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GiftController::class, 'index'])->name('home');

Route::resource('gifts', GiftController::class);
