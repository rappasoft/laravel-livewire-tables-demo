<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

class BulkActionsTest extends DuskTestCase
{
    /** @test */
    public function it_displays_bulk_actions_checkbox_column()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@bulk-actions-checkbox-all')
                ->assertPresent('@bulk-actions-checkbox-1');
        });
    }

    /** @test */
    public function it_can_select_single_row()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->assertChecked('@bulk-actions-checkbox-1');
        });
    }

    /** @test */
    public function it_can_select_all_rows()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-all')
                ->pause(200)
                ->assertChecked('@bulk-actions-checkbox-all')
                ->assertChecked('@bulk-actions-checkbox-1')
                ->assertChecked('@bulk-actions-checkbox-2');
        });
    }

    /** @test */
    public function it_can_deselect_all_rows()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-all')
                ->pause(200)
                ->uncheck('@bulk-actions-checkbox-all')
                ->pause(200)
                ->assertNotChecked('@bulk-actions-checkbox-all')
                ->assertNotChecked('@bulk-actions-checkbox-1')
                ->assertNotChecked('@bulk-actions-checkbox-2');
        });
    }

    /** @test */
    public function it_displays_bulk_actions_dropdown()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->assertPresent('@bulk-actions-dropdown')
                ->assertVisible('@bulk-actions-dropdown');
        });
    }

    /** @test */
    public function it_hides_bulk_actions_dropdown_when_no_selection()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertMissing('@bulk-actions-dropdown');
        });
    }

    /** @test */
    public function it_displays_available_bulk_actions()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->assertSee('Delete')
                ->assertSee('Export')
                ->assertSee('Activate');
        });
    }

    /** @test */
    public function it_can_execute_bulk_action()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->check('@bulk-actions-checkbox-2')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-delete')
                ->pause(500)
                ->assertSee('2 items deleted');
        });
    }

    /** @test */
    public function it_displays_confirmation_for_destructive_actions()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-delete')
                ->pause(200)
                ->assertDialogOpened('Are you sure?');
        });
    }

    /** @test */
    public function it_can_cancel_bulk_action_confirmation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-delete')
                ->pause(200)
                ->dismissDialog()
                ->pause(200)
                ->assertPresent('@bulk-actions-checkbox-1');
        });
    }

    /** @test */
    public function it_clears_selection_after_bulk_action()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->check('@bulk-actions-checkbox-2')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-export')
                ->pause(500)
                ->assertNotChecked('@bulk-actions-checkbox-1')
                ->assertNotChecked('@bulk-actions-checkbox-2')
                ->assertMissing('@bulk-actions-dropdown');
        });
    }

    /** @test */
    public function it_displays_selected_count()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->check('@bulk-actions-checkbox-2')
                ->check('@bulk-actions-checkbox-3')
                ->pause(200)
                ->assertSeeIn('@bulk-actions-count', '3 selected');
        });
    }

    /** @test */
    public function it_updates_count_when_selection_changes()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->check('@bulk-actions-checkbox-2')
                ->pause(200)
                ->assertSeeIn('@bulk-actions-count', '2 selected')
                ->uncheck('@bulk-actions-checkbox-1')
                ->pause(200)
                ->assertSeeIn('@bulk-actions-count', '1 selected');
        });
    }

    /** @test */
    public function it_can_select_all_on_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-all')
                ->pause(200)
                ->assertSeeIn('@bulk-actions-count', '10 selected');
        });
    }

    /** @test */
    public function it_can_select_all_records()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-all')
                ->pause(200)
                ->click('@select-all-records')
                ->pause(200)
                ->assertSeeIn('@bulk-actions-count', '100 selected');
        });
    }

    /** @test */
    public function it_displays_select_all_banner()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-all')
                ->pause(200)
                ->assertPresent('@select-all-banner')
                ->assertSee('Select all 100 records');
        });
    }

    /** @test */
    public function it_can_dismiss_select_all_banner()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-all')
                ->pause(200)
                ->assertVisible('@select-all-banner')
                ->click('@dismiss-select-all-banner')
                ->pause(200)
                ->assertMissing('@select-all-banner');
        });
    }

    /** @test */
    public function it_preserves_selection_across_pagination()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->check('@bulk-actions-checkbox-2')
                ->pause(200)
                ->click('@pagination-next')
                ->pause(500)
                ->click('@pagination-previous')
                ->pause(500)
                ->assertChecked('@bulk-actions-checkbox-1')
                ->assertChecked('@bulk-actions-checkbox-2');
        });
    }

    /** @test */
    public function it_can_disable_bulk_actions_for_specific_rows()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->assertPresent('@bulk-actions-checkbox-1')
                ->assertAttribute('@bulk-actions-checkbox-disabled-5', 'disabled', 'true');
        });
    }

    /** @test */
    public function it_displays_custom_bulk_action_messages()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-activate')
                ->pause(500)
                ->assertSee('Users activated successfully');
        });
    }

    /** @test */
    public function it_can_use_bulk_action_with_custom_confirmation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-archive')
                ->pause(200)
                ->assertSee('Are you sure you want to archive these users?');
        });
    }

    /** @test */
    public function it_disables_bulk_actions_during_execution()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-export')
                ->assertAttribute('@bulk-actions-dropdown', 'disabled', 'true');
        });
    }

    /** @test */
    public function it_shows_loading_indicator_during_bulk_action()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-export')
                ->assertPresent('@bulk-action-loading')
                ->pause(1000)
                ->assertMissing('@bulk-action-loading');
        });
    }

    /** @test */
    public function it_displays_error_message_when_bulk_action_fails()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-fail')
                ->pause(500)
                ->assertSee('Bulk action failed');
        });
    }

    /** @test */
    public function it_can_clear_all_selections()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->check('@bulk-actions-checkbox-2')
                ->check('@bulk-actions-checkbox-3')
                ->pause(200)
                ->click('@clear-selections')
                ->pause(200)
                ->assertNotChecked('@bulk-actions-checkbox-1')
                ->assertNotChecked('@bulk-actions-checkbox-2')
                ->assertNotChecked('@bulk-actions-checkbox-3')
                ->assertMissing('@bulk-actions-dropdown');
        });
    }

    /** @test */
    public function it_respects_bulk_action_permissions()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->assertSee('Export')
                ->assertDontSee('Delete Admin'); // Permission restricted
        });
    }

    /** @test */
    public function it_can_hide_bulk_actions_column()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/no-bulk-actions')
                ->assertMissing('@bulk-actions-checkbox-all')
                ->assertMissing('@bulk-actions-checkbox-1');
        });
    }

    /** @test */
    public function it_displays_bulk_action_buttons_instead_of_dropdown()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/bulk-action-buttons')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->assertPresent('@bulk-action-btn-delete')
                ->assertPresent('@bulk-action-btn-export')
                ->assertMissing('@bulk-actions-dropdown');
        });
    }

    /** @test */
    public function it_can_execute_bulk_action_with_additional_data()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->click('@bulk-actions-dropdown')
                ->pause(200)
                ->click('@bulk-action-assign-role')
                ->pause(200)
                ->select('@role-select', 'admin')
                ->click('@confirm-assign')
                ->pause(500)
                ->assertSee('Role assigned successfully');
        });
    }

    /** @test */
    public function it_displays_indeterminate_checkbox_state()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tw3')
                ->check('@bulk-actions-checkbox-1')
                ->pause(200)
                ->assertScript('document.querySelector("[dusk=bulk-actions-checkbox-all]").indeterminate === true');
        });
    }
}
