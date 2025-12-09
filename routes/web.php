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

// Framework/Theme Demos
Route::get('/tw2', \App\Http\Livewire\Demos\Tailwind2::class)->name('tw2');
Route::get('/tw3', \App\Http\Livewire\Demos\Tailwind3::class)->name('tw3');
Route::get('/bs4', \App\Http\Livewire\Demos\Bootstrap4::class)->name('bs4');
Route::get('/bs5', \App\Http\Livewire\Demos\Bootstrap5::class)->name('bs5');
Route::get('/pg', \App\Http\Livewire\Demos\NewPage::class)->name('pg');

// New Feature Demos (v4.0)
Route::get('/summaries', \App\Http\Livewire\Demos\SummariesTable::class)->name('summaries');
Route::get('/polling', \App\Http\Livewire\Demos\PollingTable::class)->name('polling');
Route::get('/deferred', \App\Http\Livewire\Demos\DeferredLoadingTable::class)->name('deferred');
Route::get('/grouping', \App\Http\Livewire\Demos\GroupingTable::class)->name('grouping');
Route::get('/row-classes', \App\Http\Livewire\Demos\CustomRowClassesTable::class)->name('row-classes');
Route::get('/empty-state', \App\Http\Livewire\Demos\EmptyStateTable::class)->name('empty-state');
Route::get('/relationships', \App\Http\Livewire\Demos\RelationshipsTable::class)->name('relationships');
Route::get('/relationship-types', \App\Http\Livewire\Demos\RelationshipTypesTable::class)->name('relationship-types');

// New Features Index Page
Route::get('/new-features', function () {
    return view('new-features');
})->name('new-features');
