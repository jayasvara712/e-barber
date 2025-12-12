<?php

use App\Http\Controllers\BarberController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('bookings.index');
});


Route::get('/barbers', [BarberController::class, 'index'])->name('barbers.index');
Route::resource('bookings', BookingController::class)->except(['edit', 'show', 'update']);
// route untuk mengganti status (POST)
Route::post('bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
