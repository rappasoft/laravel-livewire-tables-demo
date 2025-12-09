<?php

use App\Models\User;

beforeEach(function () {
    User::factory()->count(15)->create();
});

it('displays deferred loading demo page', function () {
    $page = visit('/deferred')
        ->assertSee('Deferred Loading')
        ->assertNoJavascriptErrors();
});

it('shows loading placeholder initially', function () {
    $page = visit('/deferred');

    // Deferred loading should show a placeholder or loading state initially
    $page->assertSee('Deferred Loading');
});

it('loads table data after initial render', function () {
    $page = visit('/deferred')
        ->waitForLivewire();

    // Table should eventually show data
    $page->assertSee('ID')
         ->assertNoJavascriptErrors();
});

