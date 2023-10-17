<div>
    <div style="width: 100%; text-align: center;">
        <h1 style="font-size: 2em">Rappasoft Livewire Table Demo</h1>
        <h2 style="font-size: 1.3em;"><strong>App Name</strong>: {{ config('app.name') }}</h2>
        <h2 style="font-size: 1.3em;"><strong>Package Version</strong>: {{ ltrim(ltrim(\Illuminate\Support\Facades\Process::run("cd .. && composer show rappasoft/laravel-livewire-tables | grep 'versions : '")->output(), 'versions :'), '* ') ?? 'Unknown' }} </h2>
        
        <div style='margin-top: 2em'>
            <span style="font-size: 1.25em; font-weight: bold;">Change Theme</span>
            <span style="padding: 1em"><a href='tw2'>Tailwind 2</a></span>
            <span style="padding: 1em"><a href='tw3'>Tailwind 3</a></span>
            <span style="padding: 1em"><a href='bs4'>Bootstrap 4</a></span>
            <span style="padding: 1em"><a href='bs5'>Bootstrap 5</a></span>
        </div>
            
        <div class="inline-flex flex-cols px-4 mx-4"  style='margin-top: 2em'>
            <div style="margin: 1em">
                @include('includes.sections.header.controls.tableSwitcher')
            </div>
            <div style="margin: 1em">
                @include('includes.sections.header.controls.filterSwitcher')
            </div>
            <div style="margin: 1em">
                @include('includes.sections.header.controls.themeSwitcher')
            </div>
            <div style="margin: 1em">
                @include('includes.sections.header.controls.localeSwitcher')
            </div>

        </div>

    </div>

