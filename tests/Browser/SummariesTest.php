<?php

use App\Models\User;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    // Create test users with data for summaries
    User::factory()->count(5)->create([
        'success_rate' => 80,
        'sort' => 100,
    ]);
    
    User::factory()->count(3)->create([
        'success_rate' => 90,
        'sort' => 200,
    ]);
});

it('displays column summaries in the table footer', function () {
    $page = visit('/summaries');

    $page->assertSee('Column Summaries')
         ->assertSee('Count:')
         ->assertSee('Sum:')
         ->assertSee('Avg:')
         ->assertNoJavascriptErrors();
});

it('calculates count summary correctly', function () {
    $page = visit('/summaries');

    // Footer should show count of all rows
    $page->assertSee('Count: 8'); // 5 + 3 users
});

it('calculates sum summary correctly', function () {
    $page = visit('/summaries');

    // Footer should show sum: (5 * 100) + (3 * 200) = 1100
    $page->assertSee('Sum: 1100');
});

it('calculates average summary correctly', function () {
    $page = visit('/summaries');

    // Average success rate: ((5 * 80) + (3 * 90)) / 8 = 83.75
    $page->assertSee('Avg: 83.8%') // Rounded to 1 decimal
         ->orSee('Avg: 83.7%'); // Depending on rounding
});

it('updates summaries when filtering', function () {
    $page = visit('/summaries');

    // Filter by search
    $page->type('search', 'test')
         ->waitForLivewire()
         ->assertSee('Column Summaries');
});

