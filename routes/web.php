<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('login', [LoginController::class, 'loginView'])->name('login-view');
    // Route::post('login', [LoginController::class, 'store'])->name('login');

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::get('change/lang/{lang}', [HomeController::class, 'ChangeLang'])->name('home.lang');

    Route::get('/product/category/{slug}', [HomeController::class, 'category'])->name('home.category');

    Route::get('/product/{slug}', [HomeController::class, 'productDetail'])->name('home.product-detail');

    // Route::middleware()->group(function () {

    // });

});
