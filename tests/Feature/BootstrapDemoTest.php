<?php

namespace Tests\Feature;

use App\Livewire\Demos\Bootstrap;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class BootstrapDemoTest extends TestCase
{
    use RefreshDatabase;

    public static function versions(): array
    {
        return [['4', '4.6.2'], ['5', '5.2.3']];
    }

    #[DataProvider('versions')]
    public function test_public_theme_url_renders_its_bootstrap_assets_and_table(string $version, string $assetVersion): void
    {
        User::factory()->create();

        $this->get('/bootstrap-'.$version)
            ->assertOk()
            ->assertSeeLivewire(Bootstrap::class)
            ->assertSee('Bootstrap '.$version.' Livewire Tables Demo')
            ->assertSee('bootstrap@'.$assetVersion.'/dist/css/bootstrap.min.css', false)
            ->assertSee('bootstrap@'.$assetVersion.'/dist/js/bootstrap.bundle.min.js', false)
            ->assertSee('laravel-livewire-table table')
            ->assertDontSee('build/assets/app-');
    }

    #[DataProvider('versions')]
    public function test_theme_survives_live_updates_and_locale_changes(string $version): void
    {
        User::factory()->create();

        Livewire::test(Bootstrap::class, ['version' => $version])
            ->assertSet('tableTheme', 'bootstrap-'.$version)
            ->assertSee('Reorder')
            ->set('filterLayout', 'slide-down')
            ->set('chosenLocale', 'fr')
            ->assertSet('tableTheme', 'bootstrap-'.$version)
            ->assertSee('Réordonner')
            ->set('chosenLocale', 'en')
            ->assertSee('Reorder');
    }

    public function test_homepage_links_to_each_theme(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertSee('href="/tailwind"', false)
            ->assertSee('href="/bootstrap-4"', false)
            ->assertSee('href="/bootstrap-5"', false);
    }
}
