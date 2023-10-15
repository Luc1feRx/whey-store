<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DestroyController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Upload\UploadController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Route;

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
    });

});

Route::get('/file', [UploadController::class, 'getFile'])->name('getFileImage');
