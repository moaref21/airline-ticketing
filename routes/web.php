<?php

use App\Http\Controllers\Admin\BookingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FlightController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/flights', [FlightController::class, 'index'])->name('admin.flights.index');

Route::get('/flights/create', [FlightController::class, 'create'])->name('admin.flights.create');

Route::post('/flights', [FlightController::class, 'store'])->name('admin.flights.store');

Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');