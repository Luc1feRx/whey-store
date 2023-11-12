<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\LoginController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\UserFavouriteController;
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
    Route::get('login', [LoginController::class, 'loginView'])->name('home.login-view');
    Route::post('login', [LoginController::class, 'loginPost'])->name('home.login');
    Route::post('register', [LoginController::class, 'postRegister'])->name('home.register');
    Route::post('logout', [LoginController::class, 'Logout'])->name('home.logout');

    Route::get('/', [HomeController::class, 'index'])->name('home.index');

    Route::get('change/lang/{lang}', [HomeController::class, 'ChangeLang'])->name('home.lang');

    Route::get('/product/category/{slug}', [HomeController::class, 'category'])->name('home.category');

    Route::get('/product/{slug}', [HomeController::class, 'productDetail'])->name('home.product-detail');

    Route::middleware(['user'])->group(function () {
        Route::post('/add-comment', [RatingController::class, 'addCommentRating'])->name('home.addCommentRating');
        // favourite product
        Route::get('/add-product-favourite/{productId}', [UserFavouriteController::class, 'addToFavorites'])->name('home.addToFavorites');
        Route::get('/wishlist', [UserFavouriteController::class, 'index'])->name('home.favouriteList');
        Route::get('/user-favourite-remove/{productId}', [UserFavouriteController::class, 'removeFromFavorites'])->name('home.removeFromFavorites');

        //profile
        Route::get('/user/profile', [ProfileController::class, 'getProfile'])->name('home.profile');
        Route::post('/user/update-profile', [ProfileController::class, 'updateProfile'])->name('home.update-profile');
    });

});
