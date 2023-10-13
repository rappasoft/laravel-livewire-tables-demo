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
Route::get('/tw2', \App\Http\Livewire\Demos\Tailwind2::class)->name('tw2');
Route::get('/tw3', \App\Http\Livewire\Demos\Tailwind3::class)->name('tw3');
Route::get('/bs4', \App\Http\Livewire\Demos\Bootstrap4::class)->name('bs4');
Route::get('/bs5', \App\Http\Livewire\Demos\Bootstrap5::class)->name('bs5');
Route::get('/pg', \App\Http\Livewire\Demos\NewPage::class)->name('pg');
