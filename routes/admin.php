<?php

use App\Http\Controllers\Backend\AccountController;
use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CommentController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DestroyController;
use App\Http\Controllers\Backend\GoodIssueController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\VoucherController;
use App\Http\Controllers\Upload\UploadController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

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

Route::group(['prefix' => 'admin', 'namespace' => 'Backend', 'as' => 'admin.'], function () {
    Route::get('login', [LoginController::class, 'create'])->name('view-login');
    Route::post('login', [LoginController::class, 'store'])->name('login');

    Route::middleware(['admin'])->group(function () {

        Route::delete('ajax/destroy', [DestroyController::class, 'destroy'])->name('ajax.destroy');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        Route::get('profile', [DashboardController::class, 'profile'])->name('profile.index');
        Route::post('profile/update', [DashboardController::class, 'update'])->name('profile.update');

        //categories
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/',[CategoryController::class, 'index'])->name('index');
            Route::get('/create',[CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[CategoryController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[CategoryController::class, 'update'])->name('update');
        });
        //categories
        Route::group(['prefix' => 'brands', 'as' => 'brands.'], function () {
            Route::get('/',[BrandController::class, 'index'])->name('index');
            Route::get('/create',[BrandController::class, 'create'])->name('create');
            Route::post('/store', [BrandController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[BrandController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[BrandController::class, 'update'])->name('update');
        });
        //slider
        Route::group(['prefix' => 'sliders', 'as' => 'sliders.'], function () {
            Route::get('/',[SliderController::class, 'index'])->name('index');
            Route::get('/create',[SliderController::class, 'create'])->name('create');
            Route::post('/store', [SliderController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[SliderController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[SliderController::class, 'update'])->name('update');
        });
        //post
        Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
            Route::get('/',[PostController::class, 'index'])->name('index');
            Route::get('/create',[PostController::class, 'create'])->name('create');
            Route::post('/store', [PostController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[PostController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[PostController::class, 'update'])->name('update');
        });
        //voucher
        Route::group(['prefix' => 'vouchers', 'as' => 'vouchers.'], function () {
            Route::get('/',[VoucherController::class, 'index'])->name('index');
            Route::get('/create',[VoucherController::class, 'create'])->name('create');
            Route::post('/store', [VoucherController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[VoucherController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[VoucherController::class, 'update'])->name('update');
        });

        //product
        Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
            Route::get('/',[ProductController::class, 'index'])->name('index');
            Route::get('/create',[ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[ProductController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[ProductController::class, 'update'])->name('update');
            Route::get('/get-product-images/{productId}', [ProductController::class, 'getProductImage'])->name('getProductImage');
        });

        //comment
        Route::group(['prefix' => 'comments', 'as' => 'comments.'], function () {
            Route::get('/',[CommentController::class, 'index'])->name('index');
        });

        //order
        Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
            Route::get('/',[OrderController::class, 'index'])->name('index');
            Route::get('/ajax-change-status',[OrderController::class, 'ajaxChangeStatus'])->name('ajaxChangeStatus');
        });
        Route::group(['prefix' => 'order-detail', 'as' => 'orderdetails.'], function () {
            Route::get('/{id}',[OrderController::class, 'getOrderDetail'])->name('index');
            Route::get('/print-order-detail/{id}',[OrderController::class, 'printOrder'])->name('print');
        });
    });

    Route::middleware(['auth:admin', 'permission:manage decentralized'])->group(function () {
        //role
        Route::group(['prefix' => 'roles', 'as' => 'roles.'], function () {
            Route::get('/',[RoleController::class, 'index'])->name('index');
            Route::get('/create',[RoleController::class, 'create'])->name('create');
            Route::post('/store', [RoleController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[RoleController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[RoleController::class, 'update'])->name('update');
        });

        //permission
        Route::group(['prefix' => 'permissions', 'as' => 'permissions.'], function () {
            Route::get('/', [PermissionController::class, 'index'])->name('index');
            Route::get('/create', [PermissionController::class, 'create'])->name('create');
            Route::post('/store', [PermissionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
            Route::post('/update/{id}', [PermissionController::class, 'update'])->name('update');
        });

        //account
        Route::group(['prefix' => 'accounts', 'as' => 'accounts.'], function () {
            Route::get('/',[AccountController::class, 'index'])->name('index');
            Route::get('/create',[AccountController::class, 'create'])->name('create');
            Route::post('/store', [AccountController::class, 'store'])->name('store');
            Route::get('/edit/{id}',[AccountController::class, 'edit'])->name('edit');
            Route::post('/update/{id}',[AccountController::class, 'update'])->name('update');
        });

    });

    Route::middleware(['auth:admin', 'permission:manage storage'])->group(function () {
        //import product
        Route::group(['prefix' => 'good-issues', 'as' => 'good-issues.'], function () {
            Route::get('/', [GoodIssueController::class, 'index'])->name('index');
            Route::get('/get-import', [GoodIssueController::class, 'create'])->name('create');
            Route::post('/store', [GoodIssueController::class, 'store'])->name('store');
        });
    });

});

Route::get('/file', [UploadController::class, 'getFile'])->name('getFileImage');
