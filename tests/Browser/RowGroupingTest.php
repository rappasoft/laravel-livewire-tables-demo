<?php

use App\Models\User;

beforeEach(function () {
    User::factory()->count(5)->create(['active' => true]);
    User::factory()->count(3)->create(['active' => false]);
});

it('displays row grouping demo page', function () {
    $page = visit('/grouping')
        ->assertSee('Row Grouping')
        ->assertNoJavascriptErrors();
});

it('shows group headers for each group', function () {
    $page = visit('/grouping')
        ->waitForLivewire();

    // Should see group headers (one for active: true, one for active: false)
    $page->assertSee('Active:')
         ->assertNoJavascriptErrors();
});

it('allows collapsing and expanding groups', function () {
    $page = visit('/grouping')
        ->waitForLivewire();

    // Click on a group header to toggle
    $page->click('Active: 1') // Click first group header
         ->waitForLivewire()
         ->assertNoJavascriptErrors();
});

it('displays row count in group headers', function () {
    $page = visit('/grouping')
        ->waitForLivewire();

    // Group headers should show item counts
    $page->assertSee('items')
         ->assertNoJavascriptErrors();
});

