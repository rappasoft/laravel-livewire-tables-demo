<?php

namespace App\Http\Livewire;

use App\Exports\NewsExport;
use App\Models\News;
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

class NewsTable extends DataTableComponent
{
    use testTrait;

    public $myParam = 'Default123';


    public string $tableName = 'newstable';

    public array $newstable = [];

    public string $filterLayout = 'popover';

    public array $fileList;

    public function configure(): void
    {


        //$userExample->tags()->sync(Tag::inRandomOrder()->take(rand(1,3))->get()->pluck('tags.id')->toArray());

        //$this->userExample
        //(Tag::inRandomOrder()->take(rand(1,3))->get()->toArray());
        $this->setPrimaryKey('id')
            ->setDebugEnabled()
            ->setAdditionalSelects(['news.id as id'])
            ->setFilterLayout($this->filterLayout)
            ->setConfigurableAreas([
                'toolbar-left-start' => ['includes.areas.toolbar-left-start', ['param1' => $this->myParam, 'param2' => ['param2' => 2]]],
            ])
            ->setReorderEnabled()
            ->setHideReorderColumnUnlessReorderingDisabled()
            ->setReorderCurrentPageOnly(false)
            ->setTdAttributes(function(Column $column, $row, $columnIndex, $rowIndex) {
                if ($column->getTitle() == 'Address') {
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
                if ($column->isField('id') || $column->isField('address.address')) {
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
                if ($column->isField('name')) {
                    return ['class' => 'text-green-500'];
                }

                return ['default' => true];
            })
            ->setSearchLazy()
            ->setQueryStringAlias('news-table')
            ->setHideBulkActionsWhenEmptyEnabled()
            ->setEagerLoadAllRelationsEnabled()
             ->setDefaultReorderSort('id', 'desc');

    }

    public function columns(): array
    {
        return [
            Column::make('Order', 'id')
            ->sortable()
            ->collapseOnMobile()
            ->excludeFromColumnSelect(),
            Column::make('Name')
                ->sortable(function (Builder $query, string $direction) {
                    return $query->orderBy('name', $direction); // Example, ->sortable() would work too.
                })
                ->searchable()
                ->secondaryHeader($this->getFilterByKey('name'))
                ->footer($this->getFilterByKey('name'))->excludeFromColumnSelect(),
            Column::make('Description', 'description'),
            Column::make('User', 'user.name'),

        ];
    }

    public function filters(): array
    {
        return [
            TextFilter::make('Name')
            ->config([
                'maxlength' => 10,
                'placeholder' => 'Search Name',
            ])
            ->filter(function (Builder $builder, string $value) {
                $builder->where('name', 'like', '%'.$value.'%');
            }),

        ];
    }

    public function builder(): Builder
    {
        return News::with(['user']);
    }

    public function bulkActions(): array
    {
        return [
            'activate' => 'Activate',
            'deactivate' => 'Deactivate',
            'export' => 'Export',
        ];
    }

    public function export()
    {
        $news = $this->getSelected();

        $this->clearSelected();

        return Excel::download(new NewsExport($news), 'news.xlsx');
    }

    public function activate()
    {
        News::whereIn('id', $this->getSelected())->update(['active' => true]);

        $this->clearSelected();
    }

    public function deactivate()
    {
        News::whereIn('id', $this->getSelected())->update(['active' => false]);

        $this->clearSelected();
    }



}
