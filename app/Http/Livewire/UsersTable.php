<?php

namespace App\Http\Livewire;

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
    public bool $hideBulkActionsOnEmpty = false;
    public bool $useHeaderAsFooter = false;
    public bool $responsive = true;
    public function bulkActions(): array
    {
        return [
            'activate'   => __('Activate'),
            'deactivate' => __('Deactivate'),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Sort')
                ->sortable(),
//                ->footer(fn($rows) => 'Total: ' . $rows->sum('sort')),
//                ->selected(),
//                ->addClass('hello')
//                ->addAttributes(['data-toggle' => 'tooltip', 'data-placement' => 'top', 'title' => 'Tooltip on top']),
            Column::make('Name')
                  ->sortable()
                  ->searchable(),
//                  ->linkTo(fn($value, $column, $row) => route('tw', $row->id)),
//                  ->selected(),
            Column::make('E-mail', 'email')
                  ->sortable()
                  ->searchable(),
            Column::make('Active')
                  ->sortable()
                  ->format(function ($value) {
                      return view('tables.cells.boolean',
                          [
                              'boolean' => $value
                          ]
                      );
                  }),
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
            'verified_from' => Filter::make('Verified From')
                ->date(),
            'verified_to' => Filter::make('Verified To')
                ->date(),
        ];
    }

    public function query()
    {
        return User::query()
           ->when($this->getFilter('verified'), function ($query, $verified) {
               if ($verified === 'yes') {
                   return $query->whereNotNull('verified');
               }

               return $query->whereNull('verified');
           })
            ->when($this->getFilter('active'), fn($query, $active) => $query->where('active', $active === 'yes'))
            ->when($this->getFilter('verified_from'), fn($query, $date) => $query->where('email_verified_at', '>=', $date))
            ->when($this->getFilter('verified_to'), fn($query, $date) => $query->where('email_verified_at', '<=', $date));

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
}
