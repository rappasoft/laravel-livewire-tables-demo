<?php

namespace Tests\Feature;

use App\Livewire\Demos\Tailwind4;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class DemoLocaleTest extends TestCase
{
    use RefreshDatabase;

    public function test_locale_changes_update_the_nested_table_in_both_directions(): void
    {
        User::factory()->create();

        Livewire::test(Tailwind4::class)
            ->assertSee('Reorder')
            ->set('chosenLocale', 'fr')
            ->assertSee('Réordonner')
            ->assertSee('Filtres')
            ->set('chosenLocale', 'en')
            ->assertSee('Reorder')
            ->assertDontSee('Réordonner');
    }
}
