@props(['displayStyle' => 'popover'])
@php
use Illuminate\Support\Facades\Process;
    $processRun = Process::run("cd .. && composer show rappasoft/laravel-livewire-tables-v3 | grep 'versions : '");
    $currentFork = ltrim(ltrim($processRun->output(), 'versions :'), '* ');
@endphp

<div style="width: 100%">

    <div style="width: 100%; text-align: center;">
            <h2>{{ config('app.name') }}</h2>
        <h4>Running Laravel-Livewire-Tables</h4>
        <h5> Branch/Version: {{ $currentFork }}</h5>
    </div>

    @include('includes.buttons.user')
    @include('includes.buttons.news')
    @include('includes.buttons.pets')

</div>
