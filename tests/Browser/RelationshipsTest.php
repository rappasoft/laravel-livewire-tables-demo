<?php

use App\Models\User;
use App\Models\Article;
use App\Models\Tag;

beforeEach(function () {
    $users = User::factory()->count(5)->create();
    
    // Create articles for users
    foreach ($users as $user) {
        Article::factory()->count(rand(2, 5))->create([
            'user_id' => $user->id,
            'is_published' => true,
        ]);
        
        Article::factory()->count(rand(0, 2))->create([
            'user_id' => $user->id,
            'is_published' => false,
        ]);
    }

    // Create tags and attach to users
    $tags = Tag::factory()->count(10)->create();
    foreach ($users as $user) {
        $user->tags()->attach($tags->random(rand(1, 4))->pluck('id'));
    }
});

it('displays relationship aggregates demo page', function () {
    $page = visit('/relationships')
        ->assertSee('Relationship Aggregates')
        ->assertNoJavascriptErrors();
});

it('shows relationship counts in columns', function () {
    $page = visit('/relationships')
        ->waitForLivewire();

    // Should see articles count column
    $page->assertSee('Articles')
         ->assertSee('articles') // In the badge or count
         ->assertNoJavascriptErrors();
});

it('displays basic relationship data with dot notation', function () {
    $page = visit('/relationships')
        ->waitForLivewire();

    // Should show address relationship data
    $page->assertSee('Address')
         ->assertNoJavascriptErrors();
});

it('shows scoped counts correctly', function () {
    $page = visit('/relationships')
        ->waitForLivewire();

    // Should show published articles count
    $page->assertSee('Published')
         ->assertNoJavascriptErrors();
});

it('displays belongsToMany relationship counts', function () {
    $page = visit('/relationships')
        ->waitForLivewire();

    // Should show tags count
    $page->assertSee('Tags')
         ->assertSee('tags') // In badge or count
         ->assertNoJavascriptErrors();
});

it('calculates aggregate footers correctly', function () {
    $page = visit('/relationships')
        ->waitForLivewire();

    // Footer should show aggregated values
    $page->assertSee('Avg:')
         ->assertSee('Total:')
         ->assertNoJavascriptErrors();
});

