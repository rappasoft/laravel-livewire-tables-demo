<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

class FilterTest extends DuskTestCase
{
    /** @test */
    public function it_displays_filter_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@filter-button')
                ->assertVisible('@filter-button');
        });
    }

    /** @test */
    public function it_can_open_filter_menu()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertVisible('@filter-menu')
                ->assertSee('Filters');
        });
    }

    /** @test */
    public function it_can_close_filter_menu()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertVisible('@filter-menu')
                ->click('@filter-close')
                ->pause(200)
                ->assertMissing('@filter-menu');
        });
    }

    /** @test */
    public function it_displays_select_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@filter-status')
                ->assertSee('Status');
        });
    }

    /** @test */
    public function it_can_apply_select_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->select('@filter-status', 'active')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[status]', 'active');
        });
    }

    /** @test */
    public function it_displays_multi_select_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@filter-roles')
                ->assertSee('Roles');
        });
    }

    /** @test */
    public function it_can_apply_multi_select_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->click('@filter-roles')
                ->check('input[value="admin"]')
                ->check('input[value="user"]')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[roles][]', 'admin');
        });
    }

    /** @test */
    public function it_displays_date_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@filter-created-date')
                ->assertSee('Created Date');
        });
    }

    /** @test */
    public function it_can_apply_date_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-created-date', '2025-01-01')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[created]', '2025-01-01');
        });
    }

    /** @test */
    public function it_displays_date_range_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@filter-date-range-min')
                ->assertPresent('@filter-date-range-max')
                ->assertSee('Date Range');
        });
    }

    /** @test */
    public function it_can_apply_date_range_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-date-range-min', '2025-01-01')
                ->type('@filter-date-range-max', '2025-12-31')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[dateRange][min]', '2025-01-01')
                ->assertQueryStringHas('filters[dateRange][max]', '2025-12-31');
        });
    }

    /** @test */
    public function it_displays_number_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@filter-age')
                ->assertSee('Age');
        });
    }

    /** @test */
    public function it_can_apply_number_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-age', '25')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[age]', '25');
        });
    }

    /** @test */
    public function it_displays_number_range_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@filter-number-range-min')
                ->assertPresent('@filter-number-range-max')
                ->assertSee('Number Range');
        });
    }

    /** @test */
    public function it_can_apply_number_range_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-number-range-min', '10')
                ->type('@filter-number-range-max', '50')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[numberRange][min]', '10')
                ->assertQueryStringHas('filters[numberRange][max]', '50');
        });
    }

    /** @test */
    public function it_displays_text_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@filter-search')
                ->assertSee('Search');
        });
    }

    /** @test */
    public function it_can_apply_text_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-search', 'John')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[search]', 'John');
        });
    }

    /** @test */
    public function it_can_clear_all_filters()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?filters[status]=active&filters[age]=25')
                ->click('@filter-button')
                ->pause(200)
                ->click('@clear-filters')
                ->pause(500)
                ->assertQueryStringMissing('filters[status]')
                ->assertQueryStringMissing('filters[age]');
        });
    }

    /** @test */
    public function it_displays_active_filter_count()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->select('@filter-status', 'active')
                ->click('@apply-filters')
                ->pause(500)
                ->assertSeeIn('@filter-count', '1');
        });
    }

    /** @test */
    public function it_displays_filter_pills_when_filters_active()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->select('@filter-status', 'active')
                ->click('@apply-filters')
                ->pause(500)
                ->assertPresent('@filter-pill-status')
                ->assertSeeIn('@filter-pill-status', 'active');
        });
    }

    /** @test */
    public function it_can_remove_filter_using_pill()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?filters[status]=active')
                ->assertPresent('@filter-pill-status')
                ->click('@filter-pill-remove-status')
                ->pause(500)
                ->assertMissing('@filter-pill-status')
                ->assertQueryStringMissing('filters[status]');
        });
    }

    /** @test */
    public function it_uses_inline_filter_layout_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/inline-filters')
                ->assertPresent('@inline-filters')
                ->assertVisible('@filter-status')
                ->assertMissing('@filter-button');
        });
    }

    /** @test */
    public function it_uses_slide_down_filter_layout_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/slide-down-filters')
                ->click('@filter-toggle')
                ->pause(300)
                ->assertVisible('@slide-down-filters')
                ->click('@filter-toggle')
                ->pause(300)
                ->assertMissing('@slide-down-filters');
        });
    }

    /** @test */
    public function it_uses_popover_filter_layout_by_default()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertVisible('@filter-popover');
        });
    }

    /** @test */
    public function it_displays_custom_filter_labels()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->assertSee('User Status')
                ->assertSee('Account Type');
        });
    }

    /** @test */
    public function it_can_reset_individual_filter()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->select('@filter-status', 'active')
                ->type('@filter-age', '25')
                ->click('@apply-filters')
                ->pause(500)
                ->click('@filter-button')
                ->pause(200)
                ->click('@reset-status-filter')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringMissing('filters[status]')
                ->assertQueryStringHas('filters[age]', '25');
        });
    }

    /** @test */
    public function it_displays_filter_defaults()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/default-filters')
                ->click('@filter-button')
                ->pause(200)
                ->assertSelected('@filter-status', 'active')
                ->assertQueryStringHas('filters[status]', 'active');
        });
    }

    /** @test */
    public function it_can_hide_filter_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/no-filters')
                ->assertMissing('@filter-button');
        });
    }

    /** @test */
    public function it_applies_filter_on_enter_key()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-search', 'John')
                ->keys('@filter-search', '{enter}')
                ->pause(500)
                ->assertQueryStringHas('filters[search]', 'John');
        });
    }

    /** @test */
    public function it_displays_filter_validation_errors()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-age', 'invalid')
                ->click('@apply-filters')
                ->pause(500)
                ->assertSee('must be a number');
        });
    }

    /** @test */
    public function it_preserves_filters_across_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->select('@filter-status', 'active')
                ->click('@apply-filters')
                ->pause(500)
                ->click('@pagination-next')
                ->pause(500)
                ->assertQueryStringHas('filters[status]', 'active')
                ->assertQueryStringHas('page', '2');
        });
    }

    /** @test */
    public function it_resets_pagination_when_filters_change()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?page=3')
                ->click('@filter-button')
                ->pause(200)
                ->select('@filter-status', 'active')
                ->click('@apply-filters')
                ->pause(500)
                ->assertQueryStringHas('filters[status]', 'active')
                ->assertQueryStringMissing('page');
        });
    }

    /** @test */
    public function it_displays_no_results_when_filters_return_empty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@filter-button')
                ->pause(200)
                ->type('@filter-search', 'NoResultsQuery123')
                ->click('@apply-filters')
                ->pause(500)
                ->assertSee('No results found');
        });
    }

    /** @test */
    public function it_can_use_custom_filter_views()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/custom-filter-view')
                ->click('@filter-button')
                ->pause(200)
                ->assertPresent('@custom-filter')
                ->assertSee('Custom Filter');
        });
    }
}
