<?php

use App\Http\Controllers\Backend\Auth\LoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
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

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        //categories
        Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
            Route::get('/',[CategoryController::class, 'index'])->name('index');
            Route::get('/create',[CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
        });
    });

});

Route::get('/file', [UploadController::class, 'getFile'])->name('getFileImage');
