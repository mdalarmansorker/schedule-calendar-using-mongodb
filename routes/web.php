<?php
use App\Http\Controllers\Controller;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterUserController;
use App\Http\Controllers\Auth\AuthenticateUserController;
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
Route::middleware('guest')->group(function(){
    Route::get('register', [RegisterUserController::class, 'create'])->name('register');
    Route::post('register', [RegisterUserController::class, 'store'])->name('register');

    Route::get('login', [AuthenticateUserController::class, 'create'])->name('login');
    Route::post('login', [AuthenticateUserController::class, 'store']);

});
Route::middleware('auth')->group(function(){
    Route::get('/', function () {
        $controller = app()->make(AppointmentController::class);
        return $controller->DayPicker(date('m'), Auth::user()->_id);
    })->name('home');
    
    Route::get('/month/{month}', function($month){
        $controller = app()->make(AppointmentController::class);
        return $controller->DayPicker($month, Auth::user()->_id);
    })->where('month', '[1-9]|1[0-2]');
    // Route::get('/month/{month}', [AppointmentController::class, 'day_picker'])->where('month', '[1-9]|1[0-2]');

    // Create appointment
    // Route::get('/create-appointment', function(){
    //     return view('create_appointment');
    // })->name('create');
    Route::get('/month/create-appointment', function(){
        return view('create_appointment');
    })->name('create');

    // Store appointments data
    Route::post('/appointment/store', [AppointmentController::class, 'StoreAppointment'])->name('appointment.store');

});






