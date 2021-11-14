<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\AuthController;
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

// admin routing
Route::prefix('admin')->group(function() {
    // orders
    Route::get('/', [
        OrderController::class, 'index'
    ])->name('dashboard')
         ->middleware(['auth']);
    Route::get('/edit/{id}', [
        OrderController::class, 'edit'
    ])->name('order.edit')
         ->middleware(['auth']);
    Route::get('/delete/{id}', [
        OrderController::class, 'delete'
    ])->name('order.delete')
         ->middleware(['auth']);
    Route::get('/archive/{id}', [
        OrderController::class, 'archive'
    ])->name('order.archive')
         ->middleware(['auth']);

    // categories
    Route::get('/category', [
        CategoryController::class, 'index'
    ])->name('category')
         ->middleware(['auth']);
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'makeRegister'])->name('register.post');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
