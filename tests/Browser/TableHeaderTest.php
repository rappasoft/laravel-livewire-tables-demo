<?php

use App\Models\User;

beforeEach(function () {
    User::factory()->count(5)->create();
});

it('displays table heading when configured', function () {
    $page = visit('/relationships')
        ->waitForLivewire();

    // Should see the heading
    $page->assertSee('Relationship Aggregates Demo')
         ->assertNoJavascriptErrors();
});

it('displays table description when configured', function () {
    $page = visit('/relationships')
        ->waitForLivewire();

    // Should see the description
    $page->assertSee('Demonstrating counts')
         ->assertNoJavascriptErrors();
});

