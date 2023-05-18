<?php

namespace App\Exports;

use App\Models\News;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsExport implements FromCollection
{
    public $news;

    public function __construct($news)
    {
        $this->news = $news;
    }

    public function collection()
    {
        return News::whereIn('id', $this->news)->get();
    }
}
