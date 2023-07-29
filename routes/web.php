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
    return view('users.tw');
})->name('tw');

Route::get('/tailwind-slidedown', function () {
    return view('users.tw', ['displayStyle' => 'slide-down']);
})->name('tw-slidedown');

Route::get('/tailwind3', function () {
    return view('users.tw3');
})->name('tw3');

Route::get('/tailwind3-slidedown', function () {
    return view('users.tw3', ['displayStyle' => 'slide-down']);
})->name('tw3-slidedown');

Route::get('/bootstrap-4', function () {
    return view('users.bs4');
})->name('bs4');

Route::get('/bootstrap-4-slidedown', function () {
    return view('users.bs4', ['displayStyle' => 'slide-down']);
})->name('bs4-slidedown');

Route::get('/bootstrap-5', function () {
    return view('users.bs5');
})->name('bs5');

Route::get('/bootstrap-5-slidedown', function () {
    return view('users.bs5', ['displayStyle' => 'slide-down']);
})->name('bs5-slidedown');

// News Table
Route::get('/news/tailwind', function () {
    return view('news.tw');
})->name('news-tw');

Route::get('/news/tailwind-slidedown', function () {
    return view('news.tw', ['displayStyle' => 'slide-down']);
})->name('news-tw-slidedown');

Route::get('/news/tailwind3', function () {
    return view('news.tw3');
})->name('news-tw3');

Route::get('/news/tailwind3-slidedown', function () {
    return view('news.tw3', ['displayStyle' => 'slide-down']);
})->name('news-tw3-slidedown');

Route::get('/news/bootstrap-4', function () {
    return view('news.bs4');
})->name('news-bs4');

Route::get('/news/bootstrap-4-slidedown', function () {
    return view('news.bs4', ['displayStyle' => 'slide-down']);
})->name('news-bs4-slidedown');

Route::get('/news/bootstrap-5', function () {
    return view('bs5');
})->name('news-bs5');

Route::get('/news/bootstrap-5-slidedown', function () {
    return view('news.bs5', ['displayStyle' => 'slide-down']);
})->name('news-bs5-slidedown');






