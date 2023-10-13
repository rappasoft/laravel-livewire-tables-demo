@php
use \Illuminate\Support\Facades\Process;
$packageVersion = ltrim(ltrim(Process::run("cd .. && composer show rappasoft/laravel-livewire-tables | grep 'versions : '")->output(), 'versions :'), '* ');
@endphp

<h3 style="display: inline; font-size: 1.3em; font-weight: bold">Package Version</h3>: {{ $packageVersion ?? 'Unknown' }}
