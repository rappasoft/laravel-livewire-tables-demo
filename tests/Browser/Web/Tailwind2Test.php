<?php

namespace Tests\Browser\Web;

use Laravel\Dusk\Browser;
use Tests\Browser\DuskTestCase;

class Tailwind2Test extends DuskTestCase
{
    /**
     * All Filters Load
     */
    public function testCorrectThemeDisplays(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tailwind');
            $browser->assertSee('Tailwind 2 Implementation');
            $browser->assertDontSee('Tailwind 3 Implementation');
            $browser->assertDontSee('Bootstrap 4 Implementation');
            $browser->assertDontSee('Bootstrap 5 Implementation');
        });
    }


        /**
     * Slide Down Doesn't Show Initially
     */
    public function testSlideDownFiltersNotVisibleInitially(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tailwind-slidedown');
            $browser->assertSee('Tailwind 2 Implementation');
            $browser->screenshot('TW2-Before-Click');
            $browser->assertDontSee('Verified To');
            $browser->click('div.flex-col > div.md\:flex.md\:justify-between.mb-4.px-4.md\:p-0 > div.w-full.mb-4.md\:mb-0.md\:w-2\/4.md\:flex.space-y-4.md\:space-y-0.md\:space-x-2 > div.relative.block.md\:inline-block.text-left > div > button')->pause(1000);
            $browser->screenshot('TW2-After-Click');
            $browser->assertSee('Verified To');

        });
    }


    /**
     * @group sorting
     */
    public function testSortViaClick(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tailwind');
            $browser->assertSee('Jayde Feil');
            
            $browser->click('div > div.shadow.overflow-y-scroll.border-b.border-gray-200.dark\:border-gray-700.sm\:rounded-lg > table > thead > tr > th:nth-child(4) > button')->pause(1000);
            $browser->assertSee("Aditya D'Amore");

            $browser->click('div > div.shadow.overflow-y-scroll.border-b.border-gray-200.dark\:border-gray-700.sm\:rounded-lg > table > thead > tr > th:nth-child(4) > button')->pause(1000);
            $browser->assertSee("Zachariah Kreiger");

        });
    }

    /**
     * @group sorting
     */
    public function testSortViaQueryString(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tailwind');
            $browser->assertSee('Jayde Feil');

            $browser->visit('/tailwind?users2[sorts][name]=asc');
            $browser->assertSee("Aditya D'Amore");

            $browser->visit('/tailwind?users2[sorts][name]=desc');
            $browser->assertSee("Zachariah Kreiger");

        });
    }

    /**
     * @group sorting
     */
    public function testSortingPillsDisplayViaClick(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tailwind');
            $browser->assertDontSee('Applied Sorting');

            $browser->click('div > div.shadow.overflow-y-scroll.border-b.border-gray-200.dark\:border-gray-700.sm\:rounded-lg > table > thead > tr > th:nth-child(4) > button')->pause(1000);
            $browser->assertSee('Applied Sorting');
            $browser->assertSee('Name: A-Z');

            $browser->click('div > div.shadow.overflow-y-scroll.border-b.border-gray-200.dark\:border-gray-700.sm\:rounded-lg > table > thead > tr > th:nth-child(4) > button')->pause(1000);
            $browser->assertSee('Applied Sorting');
            $browser->assertSee('Name: Z-A');
        });
    }

    /**
     * @group sorting
     */
    public function testSortingPillsDisplayViaQueryString(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/tailwind');
            $browser->assertDontSee('Applied Sorting');

            $browser->visit('/tailwind?users2[sorts][name]=asc');
            $browser->assertSee('Applied Sorting');
            $browser->assertSee('Name: A-Z');

            $browser->visit('/tailwind?users2[sorts][name]=desc');
            $browser->assertSee('Applied Sorting');
            $browser->assertSee('Name: Z-A');
        });
    }
}
