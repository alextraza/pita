<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\AuthController;

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
    Route::get('/',
               [AdminController::class, 'index']
    )->name('dashboard')->middleware(['auth']);
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'makeRegister'])->name('register.post');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

Route::get('/', function () {
    return view('welcome');
});
