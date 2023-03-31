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
})->name('welcome');

Route::get('/tailwind', function () {
    return view('tw');
})->name('tw');

Route::get('/tailwind-slidedown', function () {
    return view('tw-slidedown');
})->name('tw-slidedown');

Route::get('/tailwind3', function () {
    return view('tw3');
})->name('tw3');

Route::get('/tailwind3-slidedown', function () {
    return view('tw3-slidedown');
})->name('tw3-slidedown');

Route::get('/bootstrap-4', function () {
    return view('bs4');
})->name('bs4');

Route::get('/bootstrap-4-slidedown', function () {
    return view('bs4-slidedown');
})->name('bs4-slidedown');

Route::get('/bootstrap-5', function () {
    return view('bs5');
})->name('bs5');

Route::get('/bootstrap-5-slidedown', function () {
    return view('bs5-slidedown');
})->name('bs5-slidedown');
