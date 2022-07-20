<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('home');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/adminpage', function () {
    return view('admin/dashboard');
});

Route::get('/mainPage', [App\Http\Controllers\MainPageController::class, 'index'])->name('mainPage');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/adminPage', [App\Http\Controllers\HomeController::class, 'adminPage'])->name('adminPage');
Route::get('/adminPage/review', [App\Http\Controllers\ReviewController::class, 'index'])->name('review_index');
Route::get('/adminPage/review/create', [App\Http\Controllers\ReviewController::class, 'create'])->name('review_create');
Route::post('/adminPage/review/store', [App\Http\Controllers\ReviewController::class, 'store'])->name('review_store');
Route::get('/adminPage/review/edit/{id}', [App\Http\Controllers\ReviewController::class, 'edit'])->name('review_edit');
Route::put('/adminPage/review/update/{id}', [App\Http\Controllers\ReviewController::class, 'update'])->name('review_update');
Route::delete('/adminPage/review/delete/{id}', [App\Http\Controllers\ReviewController::class, 'destroy'])->name('review_delete');
