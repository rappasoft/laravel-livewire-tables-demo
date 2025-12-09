<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

class PaginationTest extends DuskTestCase
{
    /** @test */
    public function it_displays_pagination_controls()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@pagination')
                ->assertVisible('@pagination');
        });
    }

    /** @test */
    public function it_displays_next_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@pagination-next')
                ->assertVisible('@pagination-next');
        });
    }

    /** @test */
    public function it_displays_previous_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=2')
                ->assertPresent('@pagination-previous')
                ->assertVisible('@pagination-previous');
        });
    }

    /** @test */
    public function it_disables_previous_button_on_first_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertAttribute('@pagination-previous', 'disabled', 'true');
        });
    }

    /** @test */
    public function it_disables_next_button_on_last_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=10') // Last page
                ->assertAttribute('@pagination-next', 'disabled', 'true');
        });
    }

    /** @test */
    public function it_can_navigate_to_next_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@pagination-next')
                ->pause(500)
                ->assertQueryStringHas('page', '2');
        });
    }

    /** @test */
    public function it_can_navigate_to_previous_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=2')
                ->click('@pagination-previous')
                ->pause(500)
                ->assertQueryStringHas('page', '1');
        });
    }

    /** @test */
    public function it_displays_page_numbers()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@pagination-page-1')
                ->assertPresent('@pagination-page-2')
                ->assertPresent('@pagination-page-3');
        });
    }

    /** @test */
    public function it_can_navigate_to_specific_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@pagination-page-3')
                ->pause(500)
                ->assertQueryStringHas('page', '3');
        });
    }

    /** @test */
    public function it_highlights_current_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=2')
                ->assertAttributeContains('@pagination-page-2', 'class', 'active');
        });
    }

    /** @test */
    public function it_displays_ellipsis_for_many_pages()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/many-pages')
                ->assertSee('...')
                ->assertPresent('.pagination-ellipsis');
        });
    }

    /** @test */
    public function it_displays_per_page_selector()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@per-page-select')
                ->assertVisible('@per-page-select');
        });
    }

    /** @test */
    public function it_displays_per_page_options()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@per-page-select')
                ->assertSeeIn('@per-page-select', '10')
                ->assertSeeIn('@per-page-select', '25')
                ->assertSeeIn('@per-page-select', '50')
                ->assertSeeIn('@per-page-select', '100');
        });
    }

    /** @test */
    public function it_can_change_per_page_value()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->select('@per-page-select', '25')
                ->pause(500)
                ->assertQueryStringHas('perPage', '25');
        });
    }

    /** @test */
    public function it_resets_to_first_page_when_changing_per_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=3')
                ->select('@per-page-select', '25')
                ->pause(500)
                ->assertQueryStringMissing('page')
                ->assertQueryStringHas('perPage', '25');
        });
    }

    /** @test */
    public function it_displays_pagination_info()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@pagination-info')
                ->assertSeeIn('@pagination-info', 'Showing')
                ->assertSeeIn('@pagination-info', 'to')
                ->assertSeeIn('@pagination-info', 'of');
        });
    }

    /** @test */
    public function it_displays_correct_record_range()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSeeIn('@pagination-info', 'Showing 1 to 10')
                ->click('@pagination-next')
                ->pause(500)
                ->assertSeeIn('@pagination-info', 'Showing 11 to 20');
        });
    }

    /** @test */
    public function it_displays_total_records()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSeeIn('@pagination-info', 'of 100'); // Assuming 100 total
        });
    }

    /** @test */
    public function it_hides_pagination_when_single_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/single-page')
                ->assertMissing('@pagination');
        });
    }

    /** @test */
    public function it_uses_simple_pagination_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/simple-pagination')
                ->assertPresent('@pagination-next')
                ->assertPresent('@pagination-previous')
                ->assertMissing('@pagination-page-1');
        });
    }

    /** @test */
    public function it_uses_cursor_pagination_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cursor-pagination')
                ->assertPresent('@pagination-next')
                ->assertPresent('@pagination-previous')
                ->assertMissing('@pagination-page-1')
                ->assertMissing('@pagination-info');
        });
    }

    /** @test */
    public function it_displays_first_page_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=5')
                ->assertPresent('@pagination-first')
                ->assertVisible('@pagination-first');
        });
    }

    /** @test */
    public function it_displays_last_page_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@pagination-last')
                ->assertVisible('@pagination-last');
        });
    }

    /** @test */
    public function it_can_navigate_to_first_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=5')
                ->click('@pagination-first')
                ->pause(500)
                ->assertQueryStringMissing('page'); // Page 1 doesn't show in query string
        });
    }

    /** @test */
    public function it_can_navigate_to_last_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@pagination-last')
                ->pause(500)
                ->assertQueryStringHas('page', '10');
        });
    }

    /** @test */
    public function it_preserves_search_when_paginating()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?search=John')
                ->click('@pagination-next')
                ->pause(500)
                ->assertQueryStringHas('search', 'John')
                ->assertQueryStringHas('page', '2');
        });
    }

    /** @test */
    public function it_preserves_filters_when_paginating()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?filters[status]=active')
                ->click('@pagination-next')
                ->pause(500)
                ->assertQueryStringHas('filters[status]', 'active')
                ->assertQueryStringHas('page', '2');
        });
    }

    /** @test */
    public function it_preserves_sorting_when_paginating()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?sorts=name')
                ->click('@pagination-next')
                ->pause(500)
                ->assertQueryStringHas('sorts', 'name')
                ->assertQueryStringHas('page', '2');
        });
    }

    /** @test */
    public function it_displays_loading_state_during_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@pagination-next')
                ->assertPresent('.pagination-loading')
                ->pause(500)
                ->assertMissing('.pagination-loading');
        });
    }

    /** @test */
    public function it_disables_pagination_controls_during_loading()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@pagination-next')
                ->assertAttribute('@pagination-next', 'disabled', 'true');
        });
    }

    /** @test */
    public function it_displays_custom_per_page_options()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/custom-per-page')
                ->click('@per-page-select')
                ->assertSeeIn('@per-page-select', '5')
                ->assertSeeIn('@per-page-select', '15')
                ->assertSeeIn('@per-page-select', '30');
        });
    }

    /** @test */
    public function it_can_hide_per_page_selector()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/no-per-page')
                ->assertMissing('@per-page-select');
        });
    }

    /** @test */
    public function it_displays_page_input_for_jump_to_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/jump-to-page')
                ->assertPresent('@page-input')
                ->assertVisible('@page-input');
        });
    }

    /** @test */
    public function it_can_jump_to_specific_page_using_input()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/jump-to-page')
                ->type('@page-input', '5')
                ->keys('@page-input', '{enter}')
                ->pause(500)
                ->assertQueryStringHas('page', '5');
        });
    }

    /** @test */
    public function it_validates_page_input()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/jump-to-page')
                ->type('@page-input', '999')
                ->keys('@page-input', '{enter}')
                ->pause(500)
                ->assertSee('Invalid page number');
        });
    }

    /** @test */
    public function it_displays_mobile_pagination_style()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(375, 667)
                ->visit('/tw3')
                ->assertPresent('@pagination-mobile')
                ->assertMissing('@pagination-page-numbers');
        });
    }

    /** @test */
    public function it_displays_desktop_pagination_style()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1024, 768)
                ->visit('/tw3')
                ->assertPresent('@pagination-page-numbers')
                ->assertVisible('@pagination-page-1');
        });
    }

    /** @test */
    public function it_can_disable_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/no-pagination')
                ->assertMissing('@pagination')
                ->assertMissing('@per-page-select');
        });
    }

    /** @test */
    public function it_displays_infinite_scroll_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/infinite-scroll')
                ->scrollIntoView('footer')
                ->pause(1000)
                ->assertSee('Loading more...')
                ->pause(1000)
                ->assertDontSee('Loading more...');
        });
    }

    /** @test */
    public function it_handles_out_of_range_page_numbers()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=999')
                ->assertSee('Page not found')
                ->assertQueryStringHas('page', '1');
        });
    }

    /** @test */
    public function it_displays_compact_pagination_on_mobile()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(375, 667)
                ->visit('/tw3')
                ->assertPresent('@pagination-compact')
                ->assertSeeIn('@pagination-compact', '1 / 10');
        });
    }

    /** @test */
    public function it_updates_url_when_paginating()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@pagination-next')
                ->pause(500)
                ->assertPathIs('/tw3')
                ->assertQueryStringHas('page', '2');
        });
    }

    /** @test */
    public function it_can_use_loadmore_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/load-more')
                ->assertPresent('@load-more-button')
                ->click('@load-more-button')
                ->pause(500)
                ->assertSeeIn('@record-count', '20'); // Initial 10 + 10 more
        });
    }
}
