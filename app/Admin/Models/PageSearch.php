<?php

namespace App\Admin\Models;

use App\Models\Page;

class PageSearch extends Page
{
    use SearchTrait;

    protected $table = 'pages';
    protected static $_model;
    protected static $sorting = [
        'id', 'status', 'pos', 'header', 'updated_at'
    ];
    protected static $filtering = [
        'id', 'status', 'header', 'slug',
    ];
}
