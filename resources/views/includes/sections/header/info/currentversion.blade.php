@php
$packageVersion = ltrim(ltrim(\Illuminate\Support\Facades\Process::run("cd .. && php composer.phar show rappasoft/laravel-livewire-tables | grep 'versions : '")->output(), 'versions :'), '* ');
@endphp

<h5>Core Package Branch/Version: {{ $packageVersion }}</h5>
