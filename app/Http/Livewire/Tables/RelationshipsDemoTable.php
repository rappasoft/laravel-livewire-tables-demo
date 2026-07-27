<?php

namespace App\Http\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class RelationshipsDemoTable extends DataTableComponent
{
    public string $tableName = 'relationships-demo';

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            ->heading('Comprehensive Relationship Support')
            ->description('Demonstrating all relationship types: hasOne, belongsTo, hasMany, belongsToMany, hasManyThrough, and nested relationships')
            ->setFooterTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100 dark:bg-gray-800 font-semibold'];
            })
            ->setFooterTdAttributes(function (Column $column, $rows) {
                return ['class' => 'px-4 py-2'];
            });
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable()
                ->footer(fn($rows) => '<strong>Total Users: ' . $rows->count() . '</strong>')
                ->html(),

            Column::make('Name', 'name')
                ->sortable()
                ->searchable()
                ->footer(fn() => ''),

            // hasOne relationship (single model)
            Column::make('Address', 'address.address')
                ->sortable()
                ->searchable()
                ->format(fn($value) => $value ?? '<em class="text-gray-400 text-sm">No address</em>')
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-sm">hasOne</em>')
                ->html(),

            // Nested relationships (hasOne through belongsTo)
            Column::make('City', 'address.group.city.name')
                ->sortable()
                ->searchable()
                ->format(fn($value) => $value ?? '<em class="text-gray-400 text-sm">No city</em>')
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-sm">Nested: address → group → city</em>')
                ->html(),

            // hasMany relationship - show collection
            Column::make('Articles', 'articles')
                ->displayField('title')
                ->relationshipSeparator(' | ')
                ->limit(3)
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-sm">hasMany</em>')
                ->html(),

            // belongsToMany relationship - show tags
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
                ->footer(fn() => '<em class="text-gray-500 text-sm">belongsToMany</em>')
                ->html(),

            // belongsToMany with custom formatter
            Column::make('Tag Count', 'tags')
                ->formatRelations(fn($tags) => 
                    '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">' . 
                    $tags->count() . ' tags</span>'
                )
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-sm">Custom formatter</em>')
                ->html(),

            // Count aggregates
            Column::make('Articles Count', 'articles_count')
                ->counts('articles')
                ->sortable()
                ->format(fn($value) => '<span class="font-semibold">' . ($value ?? 0) . '</span>')
                ->html()
                ->footer(function($rows) {
                    $avg = round($rows->avg('articles_count') ?? 0, 1);
                    $total = $rows->sum('articles_count');
                    return "Avg: {$avg} | Total: {$total}";
                }),

            // Count with scope
            Column::make('Published Articles', 'articles_count')
                ->counts(['articles' => fn($q) => $q->where('is_published', true)])
                ->sortable()
                ->format(fn($value) => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">' . ($value ?? 0) . ' published</span>')
                ->html()
                ->footer(fn($rows) => 'Total: ' . ($rows->sum('articles_count') ?? 0)),

            BooleanColumn::make('Active', 'active')
                ->sortable()
                ->footer(fn() => ''),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->with(['address.group.city', 'articles', 'tags']);
    }
}
