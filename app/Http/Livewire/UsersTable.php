<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class UsersTable extends DataTableComponent
{

    public bool $dumpFilters = false;
    public bool $columnSelect = true;
    public string $defaultSortColumn = 'sort';
    public bool $reorderEnabled = true;
    public array $bulkActions = [
        'activate'   => 'Activate',
        'deactivate' => 'Deactivate',
    ];

    public $columnSearch = [
        'name' => null,
        'email' => null,
    ];

    public function boot()
    {
        $this->queryString['columnSearch'] = ['except' => null];
    }

    public function columns(): array
    {
        return [
            Column::make('Sort')
                ->sortable()
                ->footer(function($rows) {
                    return 'Sum: ' . $rows->sum('sort');
                }),
            Column::make('Name')
                ->sortable()
                ->searchable()
                ->asHtml()
                ->secondaryHeader(function() {
                    return view('tables.cells.input-search', ['field' => 'name', 'columnSearch' => $this->columnSearch]);
                }),
            Column::make('E-mail', 'email')
                  ->sortable()
                  ->searchable()
                  ->asHtml()
                  ->secondaryHeader(function() {
                      return view('tables.cells.input-search', ['field' => 'email', 'columnSearch' => $this->columnSearch]);
                  }),
            Column::make('Active')
                  ->sortable()
                  ->format(function ($value) {
                      return view('tables.cells.boolean',
                          [
                              'boolean' => $value
                          ]
                      );
                  }),
            Column::make('Tags')
                ->format(function($value, $column, $user) {
                    return $user->tags()->pluck('name')->implode('<br/>');
                })
                ->asHtml(),
            Column::make('Verified', 'email_verified_at')
                  ->sortable()
                  ->excludeFromSelectable(),
        ];
    }

    public function filters(): array
    {
        return [
            'verified' => Filter::make('E-mail Verified')
                ->select([
                    ''    => 'Any',
                    'yes' => 'Yes',
                    'no'  => 'No',
                ]),
            'active'   => Filter::make('Active')
                ->select([
                    ''    => 'Any',
                    'yes' => 'Yes',
                    'no'  => 'No',
                ]),
            'tags' => Filter::make('Tags')
                ->multiSelect(
                    Tag::query()
                        ->orderBy('name')
                        ->get()
                        ->keyBy('id')
                        ->map(fn($tag) => $tag->name)
                        ->toArray()
                ),
            'verified_from' => Filter::make('Verified From')
                ->date(),
            'verified_to' => Filter::make('Verified To')
                ->date(),
        ];
    }

    public function query()
    {
        return User::with('tags')
           ->when($this->getFilter('verified'), function ($query, $verified) {
               if ($verified === 'yes') {
                   return $query->whereNotNull('verified');
               }

               return $query->whereNull('verified');
           })
            ->when($this->getFilter('active'), fn($query, $active) => $query->where('active', $active === 'yes'))
            ->when($this->getFilter('verified_from'), fn($query, $date) => $query->where('email_verified_at', '>=', $date))
            ->when($this->getFilter('verified_to'), fn($query, $date) => $query->where('email_verified_at', '<=', $date))
            ->when($this->getFilter('tags'), fn($query, $tags) => $query->whereHas('tags', fn($query) => $query->whereIn('tags.id', $tags)))
            ->when($this->columnSearch['name'] ?? null, fn ($query, $name) => $query->where('name', 'like', '%' . $name . '%'))
            ->when($this->columnSearch['email'] ?? null, fn ($query, $email) => $query->where('email', 'like', '%' . $email . '%'));
    }

    public function reorder($items): void
    {
        foreach ($items as $item) {
            optional(User::find((int)$item['value']))->update(['sort' => (int)$item['order']]);
        }
    }

    public function activate(): void
    {
        if ($this->selectedRowsQuery->count() > 0) {
            User::whereIn('id', $this->selectedKeys())->update(['active' => true]);
        }

        $this->selected = [];

        $this->resetBulk();
    }

    public function deactivate(): void
    {
        if ($this->selectedRowsQuery->count() > 0) {
            User::whereIn('id', $this->selectedKeys())->update(['active' => false]);
        }

        $this->resetBulk();
    }

    public function setTableRowClass($row): ?string
    {
        if ($row->active === false)  {
            if (config('livewire-tables.theme') === 'tailwind') {
                return '!bg-red-200';
            } else if (config('livewire-tables.theme') === 'bootstrap-4') {
                return 'bg-danger text-white';
            } else if(config('livewire-tables.theme') === 'bootstrap-5') {
                return 'bg-danger text-white';
            }
        }

        return null;
    }

    public function getTableRowUrl(): string
    {
        return 'https://rappasoft.com';
    }

    public function getTableRowUrlTarget(): string
    {
        return '_blank';
    }
}
