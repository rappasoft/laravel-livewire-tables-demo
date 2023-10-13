<?php

namespace App\Http\Livewire;

use App\Exports\ArticleExport;
use App\Models\Article;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ImageColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ComponentColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\TextFilter;
use Illuminate\Support\Facades\Storage;

class ArticleTable extends DataTableComponent
{
    public $myParam = 'Default123';


    public string $tableName = 'articletable';

    public array $articletable = [];

    public string $filterLayout = 'popover';

    public array $fileList;

    public function configure(): void
    {


        //$userExample->tags()->sync(Tag::inRandomOrder()->take(rand(1,3))->get()->pluck('tags.id')->toArray());

        //$this->userExample
        //(Tag::inRandomOrder()->take(rand(1,3))->get()->toArray());
        $this->setPrimaryKey('id')
            ->setDebugEnabled()
            ->setAdditionalSelects(['articles.id as id'])
            ->setFilterLayout($this->filterLayout)
            ->setReorderEnabled()
            ->setHideReorderColumnUnlessReorderingDisabled()
            ->setReorderCurrentPageOnly(false)
            ->setTdAttributes(function(Column $column, $row, $columnIndex, $rowIndex) {
                if ($column->getTitle() == 'Title') {
                    return ['class' => 'text-red-500 break-all', 
                            'default' => false
                    ];
                }
                else return ['default' => true];

            })
            ->setSecondaryHeaderTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setSecondaryHeaderTdAttributes(function (Column $column, $rows) {
                if ($column->isField('id')) {
                    return ['class' => 'text-red-500'];
                }
                else if ($column->isHidden())
                {
                    return ['class' => 'invisible',
                    'default' => false];
                }
                else return ['default' => true];
            })
            ->setFooterTrAttributes(function ($rows) {
                return ['class' => 'bg-gray-100'];
            })
            ->setFooterTdAttributes(function (Column $column, $rows) {
                if ($column->isField('title')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setSearchLazy()
            ->setQueryStringAlias('article-table')
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setEagerLoadAllRelationsEnabled()
             ->setDefaultReorderSort('id', 'desc');

    }

    public function columns(): array
    {



        return [
            Column::make('Article ID', 'id')
            ->sortable()
            ->collapseOnMobile()
            ->excludeFromColumnSelect(),

            Column::make('Title')
                ->sortable(function (Builder $query, string $direction) {
                    return $query->orderBy('title', $direction); // Example, ->sortable() would work too.
                })
                ->searchable()
                ->secondaryHeader($this->getFilterByKey('title'))
                ->footer($this->getFilterByKey('title'))->excludeFromColumnSelect(),

                Column::make('Country')
                ->sortable(function (Builder $query, string $direction) {
                    return $query->orderBy('country', $direction); // Example, ->sortable() would work too.
                })
                ->searchable()
                ->collapseOnTablet(),
    
            BooleanColumn::make('Is Published', 'is_published'),

            Column::make('User', 'user.name')->searchable()
            ->collapseOnTablet(),

            Column::make('Published At', 'published_at')
            ->sortable(function (Builder $query, string $direction) {
                return $query->orderBy('published_at', $direction); // Example, ->sortable() would work too.
            })
            ->searchable()
            ->collapseOnTablet(),

            Column::make('Published By', 'published_by')
            ->sortable(function (Builder $query, string $direction) {
                return $query->orderBy('published_by', $direction); // Example, ->sortable() would work too.
            })
            ->searchable()
            ->collapseOnMobile(),

        ];
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Title')
            ->config([
                'maxlength' => 10,
                'placeholder' => 'Search Title',
            ])
            ->filter(function (Builder $builder, string $value) {
                $builder->where('title', 'like', '%'.$value.'%');
            }),

        ];
    }

    public function builder(): Builder
    {
        return Article::with(['user:id,name']);
    }

    public function bulkActions(): array
    {
        return [
            'publish' => 'Publish',
            'unpublish' => 'Unpublish',
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $articles = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new ArticleExport($articles), 'articles.xlsx');
    }

    public function publish()
    {
        Article::whereIn('id', $this->getSelected())->update(['is_published' => true]);

        $this->clearSelected();
    }

    public function unpublish()
    {
        Article::whereIn('id', $this->getSelected())->update(['is_published' => false]);

        $this->clearSelected();
    }



}
