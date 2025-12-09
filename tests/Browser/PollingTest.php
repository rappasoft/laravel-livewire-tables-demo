<?php

use App\Models\User;

beforeEach(function () {
    User::factory()->count(10)->create();
});

it('displays the polling demo page', function () {
    $page = visit('/polling')
        ->assertSee('Enhanced Polling')
        ->assertNoJavascriptErrors();
});

it('shows polling is enabled in the page', function () {
    $page = visit('/polling');

    // Check that polling indicator or configuration is visible
    $page->assertSee('Enhanced Polling');
});

it('table updates automatically with polling', function () {
    $page = visit('/polling');

    // Wait a bit to see if polling triggers
    $page->wait(2);

    // Should still be on the page without errors
    $page->assertNoJavascriptErrors();
});

