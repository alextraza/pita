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
Route::middleware(['auth'])->prefix('admin')->group(function() {
    // orders
    Route::get('/', [
        OrderController::class, 'index'
    ])->name('dashboard');
    Route::get('/edit/{id}', [
        OrderController::class, 'edit'
    ])->name('order.edit');
    Route::get('/create', [
        OrderController::class, 'create'
    ])->name('order.create');
    Route::get('/delete/{id}', [
        OrderController::class, 'delete'
    ])->name('order.delete');
    Route::get('/archive/{id}', [
        OrderController::class, 'archive'
    ])->name('order.archive');

    // categories
    Route::prefix('category')->name('category.')->group(function() {
        Route::get('/', [
            CategoryController::class, 'index'
        ])->name('index');
        Route::get('/create', [
            CategoryController::class, 'create'
        ])->name('create');
        Route::put('/create', [
            CategoryController::class, 'store'
        ])->name('store');
        Route::get('/edit/{id}', [
            CategoryController::class, 'edit'
        ])->name('edit');
        Route::post('/edit/{id}', [
            CategoryController::class, 'save'
        ])->name('post');
    });

    // items
    Route::prefix('item')->name('item.')->group(function() {
        Route::get('/', function() {

        })->name('index');
    });
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'makeRegister'])->name('register.post');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
