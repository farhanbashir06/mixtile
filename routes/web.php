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
Route::get('/start', function () {
    return view('start');
})->name('start');
Route::get('/access', function () {
    return view('access');
})->name('access');
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/giftcard', function () {
    return view('giftcard');
})->name('giftcard');

Route::get('/impressum', function () {
    return view('impressum');
})->name('impressum');

Route::get('/privacy', function () {
    return view('privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('terms');
})->name('terms');

Auth::routes();

Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('homepage',\App\Http\Controllers\Admin\HomePageController::class);
Route::get('homepage/review/{id}', [\App\Http\Controllers\Admin\HomePageController::class,'del_single'])->name('del.review');
Route::post('/stripe',[\App\Http\Controllers\PaymentsController::class, 'stripe']);

