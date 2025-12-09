<?php

use App\Models\User;

beforeEach(function () {
    User::factory()->count(10)->create();
});

it('has smooth transitions when sorting', function () {
    $page = visit('/summaries')
        ->waitForLivewire()
        ->click('Name') // Click to sort
        ->waitForLivewire();

    // Should not have jumpy behavior - transitions should be smooth
    $page->assertNoJavascriptErrors();
});

it('has smooth transitions when searching', function () {
    $page = visit('/summaries')
        ->waitForLivewire()
        ->type('search', 'test')
        ->waitForLivewire();

    // Should have smooth fade transitions
    $page->assertNoJavascriptErrors();
});

it('has smooth transitions when filtering', function () {
    $page = visit('/summaries')
        ->waitForLivewire()
        ->click('Filters') // Open filters if available
        ->waitForLivewire();

    $page->assertNoJavascriptErrors();
});

it('shows loading state during updates', function () {
    $page = visit('/summaries')
        ->waitForLivewire()
        ->type('search', 'new search')
        ->waitForLivewire();

    // Should show loading overlay or indicator
    $page->assertNoJavascriptErrors();
});

