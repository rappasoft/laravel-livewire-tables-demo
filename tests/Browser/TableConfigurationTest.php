<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

class TableConfigurationTest extends DuskTestCase
{
    /** @test */
    public function it_can_change_pagination_settings()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('Showing')
                ->select('@per-page-select', '25')
                ->pause(500)
                ->assertQueryStringHas('perPage', '25');
        });
    }

    /** @test */
    public function it_displays_per_page_options()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@per-page-select')
                ->assertSee('10')
                ->assertSee('25')
                ->assertSee('50');
        });
    }

    /** @test */
    public function it_can_navigate_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('1')
                ->click('@pagination-next')
                ->pause(500)
                ->assertQueryStringHas('page', '2')
                ->click('@pagination-previous')
                ->pause(500)
                ->assertQueryStringHas('page', '1');
        });
    }

    /** @test */
    public function it_displays_search_input_when_enabled()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@search-input')
                ->assertVisible('@search-input');
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
    public function it_displays_column_select_button()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@column-select-button')
                ->click('@column-select-button')
                ->pause(200)
                ->assertSee('Columns');
        });
    }

    /** @test */
    public function it_can_disable_column_select()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/no-column-select')
                ->assertMissing('@column-select-button');
        });
    }

    /** @test */
    public function it_displays_bulk_actions_checkbox()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@bulk-actions-checkbox')
                ->check('@bulk-actions-checkbox')
                ->pause(200)
                ->assertChecked('@bulk-actions-checkbox');
        });
    }

    /** @test */
    public function it_shows_loading_placeholder_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@search-input')
                ->type('@search-input', 'test')
                ->assertPresent('.loading-placeholder')
                ->pause(1000)
                ->assertMissing('.loading-placeholder');
        });
    }

    /** @test */
    public function it_can_use_custom_loading_placeholder()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/custom-loading')
                ->refresh()
                ->assertSee('Loading...')
                ->pause(1000);
        });
    }

    /** @test */
    public function it_applies_theme_classes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertAttributeContains('@table-wrapper', 'class', 'tailwind');
        });
    }

    /** @test */
    public function it_can_switch_between_themes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->click('a[href="/bs5"]')
                ->assertPathIs('/bs5')
                ->assertSourceHas('bootstrap');

            $browser->visit('/')
                ->click('a[href="/tw3"]')
                ->assertPathIs('/tw3')
                ->assertSourceHas('tailwind');
        });
    }

    /** @test */
    public function it_preserves_query_string_parameters()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3?search=John&sorts=name')
                ->assertQueryStringHas('search', 'John')
                ->assertQueryStringHas('sorts', 'name')
                ->click('@pagination-next')
                ->pause(500)
                ->assertQueryStringHas('search', 'John')
                ->assertQueryStringHas('sorts', 'name');
        });
    }

    /** @test */
    public function it_displays_table_title_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('Users');
        });
    }

    /** @test */
    public function it_shows_empty_message_when_no_results()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'ThisDoesNotExist123456')
                ->pause(500)
                ->assertSee('No results found');
        });
    }

    /** @test */
    public function it_can_use_custom_empty_message()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/custom-empty')
                ->assertSee('No users found');
        });
    }

    /** @test */
    public function it_displays_offline_indicator()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->script('window.dispatchEvent(new Event("offline"))');

            $browser->pause(200)
                ->assertSee('Offline');
        });
    }

    /** @test */
    public function it_can_refresh_table_data()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@refresh-button')
                ->pause(500)
                ->assertPresent('@table-wrapper');
        });
    }

    /** @test */
    public function it_displays_record_count()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('Showing')
                ->assertSeeIn('@pagination-info', 'of');
        });
    }

    /** @test */
    public function it_can_hide_pagination_when_single_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/single-page')
                ->assertMissing('@pagination-next')
                ->assertMissing('@pagination-previous');
        });
    }

    /** @test */
    public function it_applies_table_attributes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertAttribute('table', 'id', 'users-table')
                ->assertAttributeContains('table', 'class', 'table');
        });
    }

    /** @test */
    public function it_applies_wrapper_attributes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertAttribute('@table-wrapper', 'data-table', 'users');
        });
    }

    /** @test */
    public function it_displays_configurable_toolbar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@toolbar')
                ->assertVisible('@toolbar');
        });
    }

    /** @test */
    public function it_can_hide_toolbar()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/no-toolbar')
                ->assertMissing('@toolbar');
        });
    }

    /** @test */
    public function it_displays_deferred_loading_placeholder()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/deferred')
                ->assertSee('Loading')
                ->pause(1000)
                ->assertDontSee('Loading')
                ->assertPresent('table');
        });
    }

    /** @test */
    public function it_uses_simple_pagination_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/simple-pagination')
                ->assertPresent('@pagination-next')
                ->assertPresent('@pagination-previous')
                ->assertMissing('@pagination-page-2')
                ->assertMissing('@pagination-page-3');
        });
    }

    /** @test */
    public function it_uses_cursor_pagination_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/cursor-pagination')
                ->assertPresent('@pagination-next')
                ->assertPresent('@pagination-previous')
                ->assertMissing('@pagination-page-1');
        });
    }

    /** @test */
    public function it_displays_table_footer_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/summaries')
                ->assertPresent('tfoot')
                ->assertVisible('tfoot')
                ->assertSeeIn('tfoot', 'Total');
        });
    }

    /** @test */
    public function it_can_collapse_columns_on_mobile()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(375, 667)
                ->visit('/tw3')
                ->assertPresent('@collapsed-columns')
                ->resize(1024, 768)
                ->visit('/tw3')
                ->assertMissing('@collapsed-columns');
        });
    }

    /** @test */
    public function it_applies_responsive_table_classes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertAttributeContains('@table-wrapper', 'class', 'responsive');
        });
    }

    /** @test */
    public function it_displays_row_index_when_configured()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/row-index')
                ->assertSeeIn('tbody tr:first-child', '1')
                ->assertSeeIn('tbody tr:nth-child(2)', '2');
        });
    }

    /** @test */
    public function it_can_configure_table_heading()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/custom-heading')
                ->assertSee('User Directory')
                ->assertSee('Manage your users');
        });
    }

    /** @test */
    public function it_can_hide_table_when_empty()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/hide-when-empty')
                ->type('@search-input', 'NoResultsQuery123')
                ->pause(500)
                ->assertMissing('table')
                ->assertSee('No data available');
        });
    }
}
