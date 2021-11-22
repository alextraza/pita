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

    public static function getAll()
    {
        self::$_model = self::where('id', '>', 0);
        self::sorting();
        self::filtering();
        return self::$_model->orderBy('created_at', 'desc')->paginate(20)
                            ->withQueryString();
    }
}
