<?php

use App\Models\User;

it('displays custom empty state when no results found', function () {
    // Don't create any users - should show empty state
    $page = visit('/empty-state')
        ->waitForLivewire();

    // Should see custom empty state heading and description
    $page->assertSee('No Users Found')
         ->assertSee('Try adjusting your search')
         ->assertNoJavascriptErrors();
});

it('shows empty state with default search', function () {
    User::factory()->count(5)->create();

    $page = visit('/empty-state')
        ->waitForLivewire();

    // Default search should show empty state since it searches for non-existent value
    $page->assertSee('No Users Found')
         ->assertNoJavascriptErrors();
});

