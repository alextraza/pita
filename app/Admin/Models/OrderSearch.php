<?php

namespace App\Admin\Models;

use App\Models\Order;

class OrderSearch extends Order
{
    use SearchTrait;

    protected $table = 'orders';
    protected static $_model;
    protected static $sorting = [
        'id', 'created_at', 'name', 'status', 'payment'
    ];
    protected static $filtering = [
        'id', 'status', 'name', 'payment'
    ];
}
