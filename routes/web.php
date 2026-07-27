<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Tailwind CSS Demo
Route::get('/tailwind', App\Livewire\Demos\Tailwind4::class)->name('tailwind');

// New Feature Demos (v4.0)
Route::get('/summaries', App\Livewire\Demos\SummariesTable::class)->name('summaries');
Route::get('/polling', App\Livewire\Demos\PollingTable::class)->name('polling');
Route::get('/deferred', App\Livewire\Demos\DeferredLoadingTable::class)->name('deferred');
Route::get('/grouping', App\Livewire\Demos\GroupingTable::class)->name('grouping');
Route::get('/row-classes', App\Livewire\Demos\CustomRowClassesTable::class)->name('row-classes');
Route::get('/empty-state', App\Livewire\Demos\EmptyStateTable::class)->name('empty-state');
Route::get('/relationships', App\Livewire\Demos\RelationshipsTable::class)->name('relationships');
Route::get('/relationship-types', App\Livewire\Demos\RelationshipTypesTable::class)->name('relationship-types');

// New Features Index Page
Route::get('/new-features', function () {
    return view('new-features');
})->name('new-features');

Route::get('/test', function () {
    return view('test');
});
