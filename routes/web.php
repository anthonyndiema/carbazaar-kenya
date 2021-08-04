<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/listings', [App\Http\Controllers\ListingsController::class, 'show'])->name('show');
Route::post('/create', [App\Http\Controllers\ListingsController::class, 'create'])->name('create');
Route::get('/edit', [App\Http\Controllers\ListingsController::class, 'edit'])->name('edit');
Route::post('/delete', [App\Http\Controllers\ListingsController::class, 'delete'])->name('delete');
Route::post('/edit2', [App\Http\Controllers\ListingsController::class, 'edit2'])->name('edit2');

Route::post('/deletepic', [App\Http\Controllers\ListingsController::class, 'deletepic'])->name('deletepic');

Route::get('/create-listing', [App\Http\Controllers\ListingsController::class, 'new_listing'])->name('new-listing');

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
Route::get('/studentdashboard', [App\Http\Controllers\HomeController::class, 'stuindex'])->name('studentdashboard');