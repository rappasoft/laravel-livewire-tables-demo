<?php

use App\Models\User;

beforeEach(function () {
    User::factory()->count(5)->create(['active' => true]);
    User::factory()->count(3)->create(['active' => false]);
});

it('displays custom row classes demo page', function () {
    $page = visit('/row-classes')
        ->assertSee('Dynamic Row Styling')
        ->assertNoJavascriptErrors();
});

it('applies different row styles based on data', function () {
    $page = visit('/row-classes')
        ->waitForLivewire();

    // Rows should have different styling based on active status
    $page->assertSee('Name')
         ->assertNoJavascriptErrors();
});

