<?php

use App\Http\Controllers\AuthController;
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


Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'registerPage')->name('registerPage');
    Route::post('/store', 'registerAction')->name('registerAction');
    Route::get('/login', 'loginPage')->name('login');
    Route::post('/authenticate', 'loginAction')->name('loginAction');
    Route::get('/protected', 'protectedPage')->name('protectedPage');
    Route::get('/', 'mainPage')->name('mainPage');
    Route::post('/logout', 'logoutAction')->name('logoutAction');
});
