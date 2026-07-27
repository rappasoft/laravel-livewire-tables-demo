<?php

namespace App\Livewire\Demos\Tables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ArrayColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\AvgColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\SumColumn;

class RelationshipsDemoTable extends DataTableComponent
{
    public string $tableName = 'relationships-demo';

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setPerPageAccepted([10, 25, 50])
            ->setPerPage(10)
            // heading()/description() do not exist in v3 - the page heading is rendered by the blade view instead.
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

            // hasMany relationship - show collection (v3: ArrayColumn + data()/outputFormat()/separator())
            // Note: v3 has no limit() - cap the collection inside the data() callback instead.
            ArrayColumn::make('Articles')
                ->data(fn($value, $row) => $row->articles->take(3))
                ->outputFormat(fn($index, $value) => e($value->title))
                ->separator(' | ')
                ->footer(fn() => '<em class="text-gray-500 text-sm">hasMany</em>')
                ->html(),

            // belongsToMany relationship - show tags (v3: ArrayColumn)
            ArrayColumn::make('Tags')
                ->data(fn($value, $row) => $row->tags)
                ->outputFormat(fn($index, $value) => '<span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">' . e($value->name) . '</span>')
                ->emptyValue('<em class="text-gray-400">No tags</em>')
                ->flexRow(['class' => 'flex-wrap gap-1'])
                ->footer(fn() => '<em class="text-gray-500 text-sm">belongsToMany</em>')
                ->html(),

            // belongsToMany with custom formatter (v3: label() + html())
            Column::make('Tag Count')
                ->label(fn($row) =>
                    '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">' .
                    $row->tags->count() . ' tags</span>'
                )
                ->html()
                ->footer(fn() => '<em class="text-gray-500 text-sm">Custom formatter</em>')
                ->html(),

            // Count aggregates (v3: CountColumn + setDataSource())
            CountColumn::make('Articles Count')
                ->setDataSource('articles')
                ->sortable()
                ->footer(function($rows) {
                    $avg = round($rows->avg('articles_count') ?? 0, 1);
                    $total = $rows->sum('articles_count');
                    return "Avg: {$avg} | Total: {$total}";
                }),

            // Sum aggregate (v3: SumColumn + setDataSource(relation, column)).
            // articles has no money-style field, so we sum the is_published flag -
            // the sum of a boolean column is the number of published articles.
            // The package auto-registers withSum('articles', 'is_published') on the builder.
            SumColumn::make('Published Sum')
                ->setDataSource('articles', 'is_published')
                ->sortable()
                ->footer(fn($rows) => 'Total: ' . ($rows->sum('articles_sum_is_published') ?? 0)),

            // Avg aggregate (v3: AvgColumn) - the average of the boolean flag is the
            // publish rate; label() overrides the default output to render it as a percentage.
            AvgColumn::make('Publish Rate')
                ->setDataSource('articles', 'is_published')
                ->sortable()
                ->label(fn($row) => round(($row->articles_avg_is_published ?? 0) * 100) . '%')
                ->footer(fn($rows) => 'Avg: ' . round(($rows->avg('articles_avg_is_published') ?? 0) * 100) . '%'),

            // Count with scope - v3's setDataSource() only takes a relation name, so the
            // scoped count is added manually in builder() and rendered via label().
            Column::make('Published Articles')
                ->label(fn($row) => '<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200">' . ($row->published_articles_count ?? 0) . ' published</span>')
                ->html()
                ->footer(fn($rows) => 'Total: ' . ($rows->sum('published_articles_count') ?? 0)),

            BooleanColumn::make('Active', 'active')
                ->sortable()
                ->footer(fn() => ''),
        ];
    }

    public function builder(): Builder
    {
        return User::query()
            ->with(['address.group.city', 'articles', 'tags'])
            ->withCount(['articles as published_articles_count' => fn($q) => $q->where('is_published', true)]);
    }
}
