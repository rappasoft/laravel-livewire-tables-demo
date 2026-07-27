<?php

namespace App\Http\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class RelationshipTypesDemoTable extends DataTableComponent
{
    public string $tableName = 'relationship-types-demo';

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            ->heading('Relationship Types Demo')
            ->description('Demonstrating hasOne, belongsTo, hasMany, belongsToMany, and nested relationships')
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
            Column::make('Articles', 'articles')
                ->displayField('title')
                ->separator(', ')
                ->limit(2)
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">hasMany</em>')
                ->html(),

            // hasMany with custom formatter
            Column::make('Article Count', 'articles')
                ->formatRelations(fn($articles) => 
                    '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">' . 
                    $articles->count() . ' articles</span>'
                )
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">Custom formatter</em>')
                ->html(),

            // belongsToMany relationship - tags
            Column::make('Tags', 'tags')
                ->displayField('name')
                ->relationshipSeparator(', ')
                ->format(fn($value) => $value ? '<div class="flex flex-wrap gap-1">' . 
                    collect(explode(', ', strip_tags($value)))->map(fn($tag) => 
                        '<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">' . 
                        htmlspecialchars($tag) . '</span>'
                    )->implode('') . '</div>' : '<em class="text-gray-400">No tags</em>'
                )
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">belongsToMany</em>')
                ->html(),

            // hasOneThrough relationship
            Column::make('Address Group', 'addressgroup.name')
                ->sortable()
                ->searchable()
                ->format(fn($value) => $value ?? '<em class="text-gray-400 text-sm">No group</em>')
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-xs">hasOneThrough</em>')
                ->html(),

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
                'addressgroup',
            ]);
    }
}

