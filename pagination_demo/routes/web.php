<?php

use App\Http\Controllers\PhotoController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::controller(UserController::class)->prefix('articles')->group(function () {
    Route::get('/list', 'list');
});

Route::controller(PhotoController::class)->prefix('photo')->group(function () {
    Route::get('/index', 'index')->name('photo.index');
    Route::get('/create', 'create')->name('photo.create');
    Route::post('/store', 'store')->name('photo.store');
    Route::get('/edit/{id}', 'edit')->name('photo.edit');
    Route::put('/update/{id}', 'update')->name('photo.update');
    Route::delete('/delete/{id}','delete')->name('photo.delete');
});
