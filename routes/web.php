<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('bookings.index'));
Route::resource('bookings', BookingController::class)->except(['edit', 'show', 'update']);
Route::get('/barbers', [BarberController::class, 'index'])->name('barbers.index');
