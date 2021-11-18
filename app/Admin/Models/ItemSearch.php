<?php

namespace App\Admin\Models;

use App\Models\Item;

class ItemSearch extends Item
{
    use SearchTrait;

    protected $table = 'items';
    protected static $_model;

    protected static $sorting = [
        'id', 'header', 'pos', 'status', 'category_id'
    ];

    protected static $filtering = [
        'header', 'category_id', 'status'
    ];
}
