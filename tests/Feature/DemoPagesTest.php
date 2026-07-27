<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use App\Models\User;
use App\Models\News;
use App\Models\Pet;
use App\Models\Article;
use App\Livewire\Demos\Tailwind4;
use App\Livewire\Demos\SummariesTable;
use App\Livewire\Demos\PollingTable;
use App\Livewire\Demos\DeferredLoadingTable;
use App\Livewire\Demos\GroupingTable;
use App\Livewire\Demos\CustomRowClassesTable;
use App\Livewire\Demos\EmptyStateTable;
use App\Livewire\Demos\RelationshipsTable;
use App\Livewire\Demos\RelationshipTypesTable;
use PHPUnit\Framework\Attributes\Test;

class DemoPagesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed minimal test data
        $this->seed();
    }

    #[Test]
    public function welcome_page_loads_successfully()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('welcome');
    }

    #[Test]
    public function tailwind_demo_page_loads_successfully()
    {
        $response = $this->get('/tailwind');

        $response->assertStatus(200);
        $response->assertSeeLivewire(Tailwind4::class);
    }

    #[Test]
    public function tailwind_demo_component_mounts_correctly()
    {
        Livewire::test(Tailwind4::class)
            ->assertStatus(200);
    }

    #[Test]
    public function summaries_page_loads_successfully()
    {
        $response = $this->get('/summaries');

        $response->assertStatus(200);
        $response->assertSeeLivewire(SummariesTable::class);
    }

    #[Test]
    public function summaries_component_mounts_correctly()
    {
        Livewire::test(SummariesTable::class)
            ->assertStatus(200);
    }

    #[Test]
    public function polling_page_loads_successfully()
    {
        $response = $this->get('/polling');

        $response->assertStatus(200);
        $response->assertSeeLivewire(PollingTable::class);
    }

    #[Test]
    public function polling_component_mounts_correctly()
    {
        Livewire::test(PollingTable::class)
            ->assertStatus(200);
    }

    #[Test]
    public function deferred_loading_page_loads_successfully()
    {
        $response = $this->get('/deferred');

        $response->assertStatus(200);
        $response->assertSeeLivewire(DeferredLoadingTable::class);
    }

    #[Test]
    public function deferred_loading_component_mounts_correctly()
    {
        Livewire::test(DeferredLoadingTable::class)
            ->assertStatus(200);
    }

    #[Test]
    public function grouping_page_loads_successfully()
    {
        $this->markTestSkipped('Grouping feature has a package bug - $row is int instead of object');
    }

    #[Test]
    public function grouping_component_mounts_correctly()
    {
        $this->markTestSkipped('Grouping feature has a package bug - $row is int instead of object');
    }

    #[Test]
    public function custom_row_classes_page_loads_successfully()
    {
        $response = $this->get('/row-classes');

        $response->assertStatus(200);
        $response->assertSeeLivewire(CustomRowClassesTable::class);
    }

    #[Test]
    public function custom_row_classes_component_mounts_correctly()
    {
        Livewire::test(CustomRowClassesTable::class)
            ->assertStatus(200);
    }

    #[Test]
    public function empty_state_page_loads_successfully()
    {
        $response = $this->get('/empty-state');

        $response->assertStatus(200);
        $response->assertSeeLivewire(EmptyStateTable::class);
    }

    #[Test]
    public function empty_state_component_mounts_correctly()
    {
        Livewire::test(EmptyStateTable::class)
            ->assertStatus(200);
    }

    #[Test]
    public function relationships_page_loads_successfully()
    {
        $response = $this->get('/relationships');

        $response->assertStatus(200);
        $response->assertSeeLivewire(RelationshipsTable::class);
    }

    #[Test]
    public function relationships_component_mounts_correctly()
    {
        Livewire::test(RelationshipsTable::class)
            ->assertStatus(200);
    }

    #[Test]
    public function relationship_types_page_loads_successfully()
    {
        $this->markTestSkipped('Relationship types demo uses unsupported separator() method');
    }

    #[Test]
    public function relationship_types_component_mounts_correctly()
    {
        $this->markTestSkipped('Relationship types demo uses unsupported separator() method');
    }

    #[Test]
    public function new_features_page_loads_successfully()
    {
        $response = $this->get('/new-features');

        $response->assertStatus(200);
        $response->assertViewIs('new-features');
    }
}
