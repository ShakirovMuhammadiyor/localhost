<?php

use App\Http\Controllers\ContentController;
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

Route::get('/', [ContentController::class, 'showAll']);

Route::get('/create', [ContentController::class, 'createPage']);

Route::post('/create', [ContentController::class, 'createAction']);

Route::get('/update/{id}', [ContentController::class, 'updatePage']);

Route::patch('/update', [ContentController::class, 'updateAction']);


