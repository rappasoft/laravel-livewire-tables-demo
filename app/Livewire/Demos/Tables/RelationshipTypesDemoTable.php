<?php

namespace App\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ArrayColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class RelationshipTypesDemoTable extends DataTableComponent
{
    public string $tableName = 'relationship-types-demo';

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            // NOTE: heading()/description() do not exist in v3. The page heading is
            // rendered by the blade view instead (or use setConfigurableArea()).
            ->setFooterTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100 dark:bg-gray-800 font-semibold'];
            });
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Email', 'email')
                ->sortable()
                ->searchable(),

            // hasOne relationship - single address
            Column::make('Address', 'address.address')
                ->sortable()
                ->searchable()
                ->format(fn($value) => $value ?? '<em class="text-gray-400 text-sm">No address</em>')
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">hasOne</em>')
                ->html(),

            // belongsTo relationship - parent user
            Column::make('Parent', 'parent.name')
                ->sortable()
                ->searchable()
                ->format(fn($value) => $value ?? '<em class="text-gray-400 text-sm">No parent</em>')
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">belongsTo</em>')
                ->html(),

            // Nested relationships - address → group → city
            Column::make('City', 'address.group.city.name')
                ->sortable()
                ->searchable()
                ->format(fn($value) => $value ?? '<em class="text-gray-400 text-sm">No city</em>')
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">Nested: address.group.city</em>')
                ->html(),

            // hasMany relationship - collection of articles
            // v3: displayField()/separator()/limit() on a plain Column do not exist.
            // Use an ArrayColumn with data() + outputFormat(); the limit is applied in data().
            ArrayColumn::make('Articles', 'id')
                ->data(fn($value, $row) => $row->articles->take(2))
                ->outputFormat(fn($index, $value) => e($value->title))
                ->separator(', ')
                ->emptyValue('<em class="text-gray-400 text-sm">No articles</em>')
                ->footer(fn() => '<em class="text-gray-500 text-xs">hasMany</em>')
                ->html(),

            // hasMany with custom formatter
            // v3: formatRelations() does not exist - use a label column instead.
            Column::make('Article Count')
                ->label(fn($row) => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">' .
                    $row->articles->count() . ' articles</span>'
                )
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">Custom formatter</em>'),

            // belongsToMany relationship - tags
            // v3: relationshipSeparator() does not exist; separator() lives on ArrayColumn only.
            ArrayColumn::make('Tags', 'id')
                ->data(fn($value, $row) => $row->tags)
                ->outputFormat(fn($index, $value) => '<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">' .
                    e($value->name) . '</span>'
                )
                ->separator(' ')
                ->emptyValue('<em class="text-gray-400">No tags</em>')
                ->footer(fn() => '<em class="text-gray-500 text-xs">belongsToMany</em>')
                ->html(),

            // v3 can only build joins for hasOne/belongsTo/morphOne relations, so a
            // hasOneThrough relation cannot be used as a dot-notation column.
            // Reached here through the nested address -> group relation instead.
            Column::make('Address Group', 'address.group.name')
                ->sortable()
                ->searchable()
                ->format(fn($value) => $value ?? '<em class="text-gray-400 text-sm">No group</em>')
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">nested (hasOneThrough n/a)</em>'),

            BooleanColumn::make('Active', 'active')
                ->sortable(),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->with([
                'address.group.city',
                'parent',
                'articles',
                'tags',
            ]);
    }
}

