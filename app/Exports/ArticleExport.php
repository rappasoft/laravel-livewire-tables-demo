<?php

namespace App\Exports;

use App\Models\Article;
use Maatwebsite\Excel\Concerns\FromCollection;

class ArticleExport implements FromCollection
{
    public $articles;

    public function __construct($articles)
    {
        $this->articles = $articles;
    }

    public function collection()
    {
        return Article::whereIn('id', $this->articles)->get();
    }
}
