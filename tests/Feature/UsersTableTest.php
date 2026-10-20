<?php

namespace Tests\Feature;

use App\Livewire\UsersTable;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class UsersTableTest extends TestCase
{
    use RefreshDatabase;

    public function test_search_controls_remain_visible_after_livewire_updates(): void
    {
        $user = User::factory()->create();

        Livewire::test(UsersTable::class)
            ->assertSee('Search Method')
            ->set('search', $user->email)
            ->assertSee('Search Method')
            ->assertDontSee('Show only open invoices')
            ->set('search', '')
            ->assertSee('Search Method');
    }

    public function test_nested_filter_updates_apply_to_the_displayed_users(): void
    {
        $tag = Tag::factory()->create();
        $included = User::factory()->create();
        $excluded = User::factory()->create();
        $included->tags()->attach($tag);

        Livewire::test(UsersTable::class)
            ->set('filterComponents.tags.0', (string) $tag->id)
            ->assertDispatched('filter-was-set', tableName: 'users2', filterKey: 'tags', value: [(string) $tag->id])
            ->assertSeeHtml("rowpk='{$included->id}'")
            ->assertDontSeeHtml("rowpk='{$excluded->id}'")
            ->set('filterComponents.tags', [])
            ->assertSeeHtml("rowpk='{$included->id}'")
            ->assertSeeHtml("rowpk='{$excluded->id}'");
    }

    public function test_replacing_filter_array_applies_and_clears_filters(): void
    {
        $alpha = User::factory()->create(['name' => 'Alpha Demo', 'email' => 'alpha@example.com']);
        $beta = User::factory()->create(['name' => 'Beta Demo', 'email' => 'beta@example.com']);

        Livewire::test(UsersTable::class)
            ->set('filterComponents', ['name' => 'Alpha', 'email' => 'alpha'])
            ->assertSeeHtml("rowpk='{$alpha->id}'")
            ->assertDontSeeHtml("rowpk='{$beta->id}'")
            ->set('filterComponents', ['name' => 'Beta'])
            ->assertSet('filterComponents.email', null)
            ->assertSeeHtml("rowpk='{$beta->id}'")
            ->assertDontSeeHtml("rowpk='{$alpha->id}'")
            ->set('filterComponents', [])
            ->assertSeeHtml("rowpk='{$alpha->id}'")
            ->assertSeeHtml("rowpk='{$beta->id}'");
    }

    public function test_reordering_persists_the_configured_sort_column(): void
    {
        $first = User::factory()->create(['sort' => 1]);
        $second = User::factory()->create(['sort' => 2]);

        Livewire::test(UsersTable::class)
            ->call('storeReorder', [
                ['id' => $second->id, 'sort' => 1],
                ['id' => $first->id, 'sort' => 2],
            ]);

        $this->assertDatabaseHas('users', ['id' => $second->id, 'sort' => 1]);
        $this->assertDatabaseHas('users', ['id' => $first->id, 'sort' => 2]);
    }
}
