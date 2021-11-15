<?php

namespace App\Models\Admin;

use App\Models\Category;

class CategorySearch extends Category
{
    use SearchTrait;

    protected $table = 'categories';
    protected static $_model;
    protected static $sorting = [
        'id', 'slug', 'header', 'pos', 'status'
    ];
    protected static $filtering = [
        'header', 'slug'
    ];
}
