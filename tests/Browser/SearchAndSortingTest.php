<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

class SearchAndSortingTest extends DuskTestCase
{
    /** @test */
    public function it_displays_search_input()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@search-input')
                ->assertVisible('@search-input');
        });
    }

    /** @test */
    public function it_can_search_for_records()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'John')
                ->pause(500)
                ->assertSee('John')
                ->assertQueryStringHas('search', 'John');
        });
    }

    /** @test */
    public function it_can_clear_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?search=John')
                ->assertValue('@search-input', 'John')
                ->clear('@search-input')
                ->pause(500)
                ->assertQueryStringMissing('search');
        });
    }

    /** @test */
    public function it_displays_search_clear_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'John')
                ->pause(500)
                ->assertPresent('@search-clear')
                ->assertVisible('@search-clear');
        });
    }

    /** @test */
    public function it_can_clear_search_using_clear_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'John')
                ->pause(500)
                ->click('@search-clear')
                ->pause(500)
                ->assertValue('@search-input', '')
                ->assertQueryStringMissing('search');
        });
    }

    /** @test */
    public function it_debounces_search_input()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'J')
                ->pause(100)
                ->type('@search-input', 'o')
                ->pause(100)
                ->type('@search-input', 'h')
                ->pause(100)
                ->type('@search-input', 'n')
                ->pause(100)
                ->assertQueryStringMissing('search')
                ->pause(500) // Wait for debounce
                ->assertQueryStringHas('search', 'John');
        });
    }

    /** @test */
    public function it_displays_no_results_when_search_returns_empty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'NoResultsQuery123456')
                ->pause(500)
                ->assertSee('No results found');
        });
    }

    /** @test */
    public function it_can_search_across_multiple_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'john@example.com')
                ->pause(500)
                ->assertSee('John')
                ->assertSee('john@example.com');
        });
    }

    /** @test */
    public function it_resets_pagination_when_searching()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=3')
                ->type('@search-input', 'John')
                ->pause(500)
                ->assertQueryStringHas('search', 'John')
                ->assertQueryStringMissing('page');
        });
    }

    /** @test */
    public function it_displays_search_placeholder()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertAttribute('@search-input', 'placeholder', 'Search...');
        });
    }

    /** @test */
    public function it_can_use_exact_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/exact-search')
                ->type('@search-input', 'John Doe')
                ->pause(500)
                ->assertSee('John Doe')
                ->assertDontSee('John Smith');
        });
    }

    /** @test */
    public function it_displays_sortable_column_indicators()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@sort-name')
                ->assertPresent('.sort-icon');
        });
    }

    /** @test */
    public function it_can_sort_column_ascending()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@sort-name')
                ->pause(500)
                ->assertQueryStringHas('sorts', 'name')
                ->assertPresent('.sort-asc-icon');
        });
    }

    /** @test */
    public function it_can_sort_column_descending()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@sort-name') // First click: asc
                ->pause(500)
                ->click('@sort-name') // Second click: desc
                ->pause(500)
                ->assertQueryStringHas('sorts', '-name')
                ->assertPresent('.sort-desc-icon');
        });
    }

    /** @test */
    public function it_can_clear_sort()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@sort-name')
                ->pause(500)
                ->click('@sort-name')
                ->pause(500)
                ->click('@sort-name') // Third click: clear
                ->pause(500)
                ->assertQueryStringMissing('sorts');
        });
    }

    /** @test */
    public function it_can_sort_multiple_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@sort-name')
                ->pause(500)
                ->keys('@sort-email', ['{shift}']) // Hold shift
                ->click('@sort-email')
                ->pause(500)
                ->assertQueryStringHas('sorts', 'name,email');
        });
    }

    /** @test */
    public function it_displays_sort_direction_indicators()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?sorts=name')
                ->assertPresent('.sort-asc-icon')
                ->visit('/tw3?sorts=-name')
                ->assertPresent('.sort-desc-icon');
        });
    }

    /** @test */
    public function it_resets_pagination_when_sorting()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=3')
                ->click('@sort-name')
                ->pause(500)
                ->assertQueryStringHas('sorts', 'name')
                ->assertQueryStringMissing('page');
        });
    }

    /** @test */
    public function it_preserves_search_when_sorting()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?search=John')
                ->click('@sort-name')
                ->pause(500)
                ->assertQueryStringHas('search', 'John')
                ->assertQueryStringHas('sorts', 'name');
        });
    }

    /** @test */
    public function it_can_set_default_sort()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/default-sort')
                ->assertQueryStringHas('sorts', 'name')
                ->assertPresent('.sort-asc-icon');
        });
    }

    /** @test */
    public function it_can_disable_sorting_on_specific_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@sort-name')
                ->assertMissing('@sort-actions'); // Actions column not sortable
        });
    }

    /** @test */
    public function it_displays_sort_pill()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@sort-name')
                ->pause(500)
                ->assertPresent('@sort-pill-name')
                ->assertSeeIn('@sort-pill-name', 'Name');
        });
    }

    /** @test */
    public function it_can_remove_sort_using_pill()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?sorts=name')
                ->assertPresent('@sort-pill-name')
                ->click('@sort-pill-remove-name')
                ->pause(500)
                ->assertMissing('@sort-pill-name')
                ->assertQueryStringMissing('sorts');
        });
    }

    /** @test */
    public function it_can_search_with_wildcard()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/wildcard-search')
                ->type('@search-input', 'Jo*')
                ->pause(500)
                ->assertSee('John')
                ->assertSee('Joe');
        });
    }

    /** @test */
    public function it_highlights_search_terms_in_results()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/highlight-search')
                ->type('@search-input', 'John')
                ->pause(500)
                ->assertPresent('.search-highlight')
                ->assertSeeIn('.search-highlight', 'John');
        });
    }

    /** @test */
    public function it_can_search_relationships()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/relationships')
                ->type('@search-input', 'Laravel')
                ->pause(500)
                ->assertSee('Laravel')
                ->assertSee('Posts'); // Parent record with Laravel tag
        });
    }

    /** @test */
    public function it_can_sort_by_relationship_column()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/relationships')
                ->click('@sort-category')
                ->pause(500)
                ->assertQueryStringHas('sorts', 'category.name');
        });
    }

    /** @test */
    public function it_displays_loading_indicator_during_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'John')
                ->assertPresent('.search-loading')
                ->pause(500)
                ->assertMissing('.search-loading');
        });
    }

    /** @test */
    public function it_can_use_custom_search_placeholder()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/custom-search-placeholder')
                ->assertAttribute('@search-input', 'placeholder', 'Search users...');
        });
    }

    /** @test */
    public function it_can_disable_search()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/no-search')
                ->assertMissing('@search-input');
        });
    }

    /** @test */
    public function it_can_sort_by_aggregate_column()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/relationships')
                ->click('@sort-posts-count')
                ->pause(500)
                ->assertQueryStringHas('sorts', 'posts_count');
        });
    }

    /** @test */
    public function it_displays_custom_sort_icons()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/custom-sort-icons')
                ->click('@sort-name')
                ->pause(500)
                ->assertPresent('.custom-sort-asc');
        });
    }

    /** @test */
    public function it_persists_search_across_page_refresh()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'John')
                ->pause(500)
                ->refresh()
                ->assertValue('@search-input', 'John')
                ->assertQueryStringHas('search', 'John');
        });
    }

    /** @test */
    public function it_can_search_by_date_format()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', '2025-01-01')
                ->pause(500)
                ->assertSee('2025-01-01');
        });
    }

    /** @test */
    public function it_can_clear_all_sorting()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?sorts=name,-email')
                ->click('@clear-all-sorts')
                ->pause(500)
                ->assertQueryStringMissing('sorts');
        });
    }
}
