<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $controller = app()->make(AppointmentController::class);
    return $controller->day_picker(date('m'));
})->name('home');

Route::resource('user', AuthController::class);
Route::get('/month/{month}', [AppointmentController::class, 'day_picker'])->where('month', '[1-9]|1[0-2]');

// Create appointment
Route::get('/create-appointment', function(){
    return view('create_appointment');
})->name('create');
Route::get('/month/create-appointment', function(){
    return view('create_appointment');
})->name('create');

// Store appointments data
Route::post('/store-appointment', [AppointmentController::class, 'store_appointments'])->name('store_appointments');

