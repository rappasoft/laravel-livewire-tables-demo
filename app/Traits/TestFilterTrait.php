<?php

namespace App\Traits;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;


trait TestFilterTrait {
    
    public array $tagFilterOptions = [];

    public function updateFilterOptions()
    {
        $this->getFilterByKey('tag_filter')->options(isset($this->filterComponents['user_filter']) ?
        Tag::select('name','id')->whereHas('user', function (Builder $query) {
                    $query->where('users.id', $this->filterComponents['user_filter'] ?? 0);
            })->get()->pluck('name','id')->toArray() : ['Select User First']);
    }
}
