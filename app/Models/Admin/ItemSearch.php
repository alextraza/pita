<?php

namespace App\Models\Admin;

use App\Models\Item;

class ItemSearch extends Item
{
    use SearchTrait;

    protected $table = 'items';
    protected static $_model;

    protected static $sorting = [
        'id', 'header', 'pos', 'status'
    ];

    protected static $filtering = [
        'header'
    ];
}
