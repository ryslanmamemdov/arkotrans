<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DriversController;
use App\Http\Controllers\Admin\CarsController;
use App\Http\Controllers\Admin\TrailersController;
use App\Http\Controllers\Admin\TransportDataTypesController;
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

Route::prefix('drivers')->group(function () {
    Route::get('/', [DriversController::class, 'index'])->name('drivers');
    Route::get('/add', [DriversController::class, 'add'])->name('driver.add');
    Route::get('/edit/{id}', [DriversController::class, 'edit'])->name('driver.edit');
    Route::post('/store', [DriversController::class, 'store'])->name('driver.store');
    Route::post('/update/{id}', [DriversController::class, 'update'])->name('driver.update');
    Route::get('/delete/{id}', [DriversController::class, 'delete'])->name('driver.delete');
});

Route::prefix('transport')->group(function () {
    Route::get('/', function () {
        return Redirect::route('cars');
    });
    Route::prefix('cars')->group(function () {
        Route::get('/', [CarsController::class, 'index'])->name('cars');
        Route::get('/add', [CarsController::class, 'add'])->name('car.add');
        Route::get('/edit/{id}', [CarsController::class, 'edit'])->name('car.edit');
        Route::post('/store', [CarsController::class, 'store'])->name('car.store');
        Route::post('/update/{id}', [CarsController::class, 'update'])->name('car.update');
        Route::get('/delete/{id}', [CarsController::class, 'delete'])->name('car.delete');
    });

    Route::prefix('trailers')->group(function () {
        Route::get('/', [TrailersController::class, 'index'])->name('trailers');
        Route::get('/add', [TrailersController::class, 'add'])->name('trailer.add');
        Route::get('/edit/{id}', [TrailersController::class, 'edit'])->name('trailer.edit');
        Route::post('/store', [TrailersController::class, 'store'])->name('trailer.store');
        Route::post('/update/{id}', [TrailersController::class, 'update'])->name('trailer.update');
        Route::get('/delete/{id}', [TrailersController::class, 'delete'])->name('trailer.delete');
    });

    Route::prefix('datatypes')->group(function () {
        Route::get('/', [TransportDataTypesController::class, 'index'])->name('transportdatatypes');
        Route::get('/add', [TransportDataTypesController::class, 'add'])->name('transportdatatypes.add');
        Route::get('/edit/{id}', [TransportDataTypesController::class, 'edit'])->name('transportdatatypes.edit');
        Route::post('/store', [TransportDataTypesController::class, 'store'])->name('transportdatatypes.store');
        Route::post('/update/{id}', [TransportDataTypesController::class, 'update'])->name('transportdatatypes.update');
        Route::get('/delete/{id}', [TransportDataTypesController::class, 'delete'])->name('transportdatatypes.delete');
    });
});

Auth::routes();
