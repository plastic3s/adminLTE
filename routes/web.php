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

//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/select2', function () {
    return view('select2.index');
})->name('select2.index')->middleware('auth');;


Route::get('/products', function () {
    return view('products.index');
})->name('products.index')->middleware('auth');;

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
