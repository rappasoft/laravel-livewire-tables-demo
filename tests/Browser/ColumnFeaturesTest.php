<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

class ColumnFeaturesTest extends DuskTestCase
{
    /** @test */
    public function it_can_display_sortable_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('Name')
                ->click('@sort-name') // Click sort header
                ->pause(500)
                ->assertQueryStringHas('sorts', 'name')
                ->click('@sort-name') // Click again for desc
                ->pause(500)
                ->assertQueryStringHas('sorts', '-name');
        });
    }

    /** @test */
    public function it_can_toggle_column_visibility()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@column-select-button')
                ->pause(200)
                ->assertSee('Name')
                ->assertSee('Email')
                ->uncheck('column-name')
                ->pause(500)
                ->assertDontSee('Name') // Column header hidden
                ->check('column-name')
                ->pause(500)
                ->assertSee('Name'); // Column header visible again
        });
    }

    /** @test */
    public function it_displays_searchable_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->type('@search-input', 'John')
                ->pause(500)
                ->assertSee('John')
                ->assertDontSee('Jane');
        });
    }

    /** @test */
    public function it_can_display_html_in_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSourceHas('<strong>')
                ->assertSourceHas('<em>');
        });
    }

    /** @test */
    public function it_displays_formatted_column_values()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('$') // Currency formatting
                ->assertSee('%'); // Percentage formatting
        });
    }

    /** @test */
    public function it_displays_column_labels()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('View')
                ->assertSee('Edit')
                ->assertSee('Delete');
        });
    }

    /** @test */
    public function it_displays_relationship_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/relationships')
                ->assertSee('Tags')
                ->assertSee('PHP')
                ->assertSee('Laravel');
        });
    }

    /** @test */
    public function it_displays_relationship_aggregates()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/relationships')
                ->assertSee('Posts Count')
                ->assertSee('Total Views');
        });
    }

    /** @test */
    public function it_displays_column_with_custom_separator()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/relationships')
                ->assertSee(' | ') // Custom separator
                ->assertSee(', '); // Default separator
        });
    }

    /** @test */
    public function it_displays_limited_relationship_items()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/relationships')
                ->assertSee('...and')
                ->assertSee('more');
        });
    }

    /** @test */
    public function it_hides_columns_on_mobile()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(375, 667) // Mobile size
                ->visit('/tw3')
                ->assertDontSee('Created At'); // Collapsed on mobile

            $browser->resize(1024, 768) // Desktop size
                ->visit('/tw3')
                ->assertSee('Created At'); // Visible on desktop
        });
    }

    /** @test */
    public function it_displays_column_footers()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/summaries')
                ->assertSee('Total:')
                ->assertSee('Average:')
                ->assertSee('Count:');
        });
    }

    /** @test */
    public function it_displays_secondary_headers()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('Search by name')
                ->assertSee('Filter by status');
        });
    }

    /** @test */
    public function it_can_reorder_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@column-select-button')
                ->pause(200)
                ->assertSee('Reorder Columns');

            // Drag and drop column reordering would need more complex implementation
        });
    }

    /** @test */
    public function it_displays_clickable_rows()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@row-1')
                ->pause(200)
                ->assertPathIs('/users/1');
        });
    }

    /** @test */
    public function it_applies_column_attributes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertAttribute('@column-email', 'class', 'font-mono');
        });
    }

    /** @test */
    public function it_displays_color_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('.color-swatch')
                ->assertVisible('.color-swatch');
        });
    }

    /** @test */
    public function it_displays_image_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('img[src*="avatar"]')
                ->assertVisible('img[src*="avatar"]');
        });
    }

    /** @test */
    public function it_displays_boolean_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('Yes')
                ->assertSee('No')
                ->assertPresent('.check-icon')
                ->assertPresent('.x-icon');
        });
    }

    /** @test */
    public function it_displays_date_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSeeIn('@created-at', date('Y-m-d'));
        });
    }

    /** @test */
    public function it_displays_component_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@livewire-component')
                ->assertSee('Component Content');
        });
    }

    /** @test */
    public function it_displays_link_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('a[href*="/users/"]')
                ->click('a[href*="/users/1"]')
                ->pause(200)
                ->assertPathIs('/users/1');
        });
    }

    /** @test */
    public function it_displays_button_group_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('.btn-group')
                ->assertSee('Edit')
                ->assertSee('Delete');
        });
    }

    /** @test */
    public function it_displays_array_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertSee('[')
                ->assertSee(']')
                ->assertSee(',');
        });
    }

    /** @test */
    public function it_can_export_columns()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->click('@export-button')
                ->pause(200)
                ->assertSee('CSV')
                ->assertSee('Excel')
                ->assertSee('PDF');
        });
    }
}
