@props(['displayStyle' => 'popover'])
<div style="width: 100%">
    <div style="width: 100%; text-align: center;">
        <h4>Rappasoft Laravel Livewire Tables Demo</h4>
        <h2>{{ config('app.name') }}</h2>
    </div>

    @include('includes.buttons.user')
    @include('includes.buttons.news')
</div>
