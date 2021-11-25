<?php

use App\Admin\Controllers\AdminController;
use App\Admin\Controllers\CategoryController;
use App\Admin\Controllers\ConfigController;
use App\Admin\Controllers\ItemController;
use App\Admin\Controllers\OrderController;
use App\Admin\Controllers\PageController;
use App\Admin\Controllers\UserController;
use App\Http\Controllers\{AuthController, FrontendController, CartController, CheckoutController};
use App\Http\Middleware\IsAdmin;
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
Route::middleware(['auth', IsAdmin::class])->prefix('admin')->group(function() {
    // orders
    Route::get('/', [
        OrderController::class, 'index'
    ])->name('dashboard');
    Route::get('/edit/{id}', [
        OrderController::class, 'edit'
    ])->name('order.edit');
    Route::post('/edit/{id}', [
        OrderController::class, 'save'
    ])->name('order.post');
    Route::get('/delete', [
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
        Route::get('/delete', [
            CategoryController::class, 'delete'
        ])->name('delete');
        Route::get('/archive/{id}', [
            CategoryController::class, 'archive'
        ])->name('archive');

        //delete image
        Route::post('/delimg/{id}/{attr}', [
            CategoryController::class, 'imgdel'
        ])->name('img_delete');

        //change status
        Route::post('/change-status/{id}', [
            CategoryController::class, 'changeStatus'
        ])->name('change_status');

        //change position
        Route::post('/change-position', [
            CategoryController::class, 'changePos'
        ])->name('change_position');
    });

    // items
    Route::prefix('item')->name('item.')->group(function() {
        Route::get('/', [
            ItemController::class, 'index'
        ])->name('index');
        Route::get('/create', [
            ItemController::class, 'create'
        ])->name('create');
        Route::put('/create', [
            ItemController::class, 'store'
        ])->name('store');
        Route::get('/edit/{id}', [
            ItemController::class, 'edit'
        ])->name('edit');
        Route::post('/edit/{id}', [
            ItemController::class, 'save'
        ])->name('post');
        Route::get('/delete', [
            ItemController::class, 'delete'
        ])->name('delete');
        Route::get('/archive/{id}', [
            ItemController::class, 'archive'
        ])->name('archive');

        //delete image
        Route::post('/delimg/{id}/{attr}', [
            ItemController::class, 'imgdel'
        ])->name('img_delete');

        //change status
        Route::post('/change-status/{id}', [
            ItemController::class, 'changeStatus'
        ])->name('change_status');

        //change position
        Route::post('/change-position', [
            ItemController::class, 'changePos'
        ])->name('change_position');
    });

    // pages
    Route::prefix('page')->name('page.')->group(function() {
        Route::get('/', [
            PageController::class, 'index'
        ])->name('index');
        Route::get('/create', [
            PageController::class, 'create'
        ])->name('create');
        Route::put('/create', [
            PageController::class, 'store'
        ])->name('store');
        Route::get('/edit/{id}', [
            PageController::class, 'edit'
        ])->name('edit');
        Route::post('/edit/{id}', [
            PageController::class, 'save'
        ])->name('post');
        Route::get('/delete', [
            PageController::class, 'delete'
        ])->name('delete');
        Route::get('/archive/{id}', [
            PageController::class, 'archive'
        ])->name('archive');

        //delete image
        Route::post('/delimg/{id}/{attr}', [
            PageController::class, 'imgdel'
        ])->name('img_delete');

        //change status
        Route::post('/change-status/{id}', [
            PageController::class, 'changeStatus'
        ])->name('change_status');

        //change position
        Route::post('/change-position', [
            PageController::class, 'changePos'
        ])->name('change_position');
    });

    // users
    Route::prefix('user')->name('user.')->group(function() {
        Route::get('/', [
            UserController::class, 'index'
        ])->name('index');
        Route::get('/create', [
            UserController::class, 'create'
        ])->name('create');
        Route::put('/create', [
            UserController::class, 'store'
        ])->name('store');
        Route::get('/edit/{id}', [
            UserController::class, 'edit'
        ])->name('edit');
        Route::post('/edit/{id}', [
            UserController::class, 'save'
        ])->name('post');
        Route::get('/delete', [
            UserController::class, 'delete'
        ])->name('delete');
        Route::get('/archive/{id}', [
            UserController::class, 'archive'
        ])->name('archive');
    });

    // config
    Route::get('/config', [
        ConfigController::class, 'index'
    ])->name('config.index');
    Route::post('/config', [
        ConfigController::class, 'save'
    ])->name('config.post');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.post');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'makeRegister'])->name('register.post');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

/**
*
* user management
*
*/
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('ulogin', [AuthController::class, 'userLogin'])->name('login.user');
Route::post('uregister', [AuthController::class, 'userRegister'])->name('register.user');

Route::prefix('cart')->name('cart.')->group(function() {
    Route::get('/', [
        CartController::class, 'index'
    ])->name('index');
    Route::get('/add/{id}', [
        CartController::class, 'addOffer'
    ])->name('offer');
    Route::post('/add', [
        CartController::class, 'add'
    ])->name('add');
    Route::post('/update', [
        CartController::class, 'update'
    ])->name('update');
    Route::post('/rm', [
        CartController::class, 'rm'
    ])->name('remove');
});

// frontend
Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/user', [FrontendController::class, 'user'])->name('user');
Route::post('/address', [FrontendController::class, 'user'])->name('user.address');

//checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::put('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

Route::get('/{slug}', [FrontendController::class, 'page'])->name('page');
