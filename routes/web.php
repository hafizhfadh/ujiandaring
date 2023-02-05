<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [\App\Http\Controllers\Backend\Auth\AuthController::class, 'index'])->name('login.index');
Route::post('login', [\App\Http\Controllers\Backend\Auth\AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [\App\Http\Controllers\Backend\Auth\AuthController::class, 'logout'])->name('login.logout');
    Route::get('dashboard', [\App\Http\Controllers\Backend\DashboardController::class, 'index'])->name('dashboard.index');
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [\App\Http\Controllers\Backend\UserController::class, 'index'])->name('users.index');
        Route::post('store', [\App\Http\Controllers\Backend\UserController::class, 'store'])->name('users.store');
        Route::get('{id}/edit', [\App\Http\Controllers\Backend\UserController::class, 'edit'])->name('users.edit');
        Route::post('{id}/update', [\App\Http\Controllers\Backend\UserController::class, 'update'])->name('users.update');
        Route::delete('{id}', [\App\Http\Controllers\Backend\UserController::class, 'delete'])->name('users.delete');
    });
    Route::get('exams', [\App\Http\Controllers\Backend\ExamController::class, 'index'])->name('exams.index');
});

// Create Clear Cache Route
Route::get('/clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});
