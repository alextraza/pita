<?php

namespace App\Models\Admin;

use App\Models\Order;

class OrderSearch extends Order
{
    use SearchTrait;

    protected $table = 'orders';
    protected static $_model;
    protected static $sorting = [
        'id', 'status'
    ];
    protected static $filtering = [
        'id', 'status', 'name'
    ];
}
