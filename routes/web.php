<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DriversController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/drivers', [DriversController::class, 'index'])->name('drivers');
Route::get('/drivers/add', [DriversController::class, 'add'])->name('driver.add');
Route::get('/drivers/edit/{id}', [DriversController::class, 'edit'])->name('driver.edit');
Route::post('/drivers/store', [DriversController::class, 'store'])->name('driver.store');

Auth::routes();
