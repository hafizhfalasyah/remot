<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CheckoutController;

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

// Rent routes
Route::middleware('auth')->group(function () {
    Route::get('/rent-list', [RentController::class, 'index']);
    Route::get('/add-rent', [RentController::class, 'addRent']);
    Route::post('/save-rent', [RentController::class, 'saveRent']);
    Route::get('/edit-rent/{id}', [RentController::class, 'editRent']);
    Route::post('/update-rent', [RentController::class, 'updateRent']);
    Route::get('/delete-rent/{id}', [RentController::class, 'deleteRent']);
});

// User routes
Route::middleware('auth')->group(function () {
    Route::get('/user-list', [UserController::class, 'index']);
    Route::get('/add-user', [UserController::class, 'addUser']);
    Route::post('/save-user', [UserController::class, 'saveUser']);
    Route::get('/edit-user/{id}', [UserController::class, 'editUser']);
    Route::post('/update-user', [UserController::class, 'updateUser']);
    Route::get('/delete-user/{id}', [UserController::class, 'deleteUser']);
});

// Motor routes
Route::middleware('auth')->group(function () {
    Route::get('/motor-list', [MotorController::class, 'index']);
    Route::get('/add-motor', [MotorController::class, 'addMotor']);
    Route::post('/save-motor', [MotorController::class, 'saveMotor']);
    Route::get('/edit-motor/{id}', [MotorController::class, 'editMotor']);
    Route::post('/update-motor', [MotorController::class, 'updateMotor']);
    Route::get('/delete-motor/{id}', [MotorController::class, 'deleteMotor']);
});

Route::get('/', function () {
    return view('user.home');
});

Route::post('/all', [MotorController::class, 'allMotors']);
Route::get('/all', [MotorController::class, 'allMotors']);
Route::get('/read', [MotorController::class, 'read']);
Route::get('/ajax', [MotorController::class, 'ajax']);
Route::get('/form', function () {return view('user.form');});
Route::post('/checkout', [CheckoutController::class, 'checkout']);
Route::get('/invoice/{id}', [CheckoutController::class, 'invoice']);

// Authentication routes
Auth::routes();

// Home routes
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\ContactController::class, 'store'])->name('home.post');
Route::middleware('auth', 'is_admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('home');
});








