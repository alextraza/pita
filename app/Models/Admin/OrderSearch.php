<?php

namespace App\Models\Admin;

use App\Models\Order;

class OrderSearch extends Order
{
    protected $table = 'orders';
    protected static $_model;
    protected static $sorting = [
        'id', 'status'
    ];
    protected static $filtering = [
        'id', 'status', 'name'
    ];

    public static function getAll()
    {
        self::$_model = self::where('id', '>', 0);
        self::sorting();
        self::filtering();
        return self::$_model->paginate(20)
                            ->withQueryString();
    }

    private static function sorting()
    {
        if ($sort = request()->input('sort')) {
            foreach ($sort as $attribute => $sortDirection) {
                if (in_array($attribute, self::$sorting)) {
                    self::$_model->orderBy($attribute, $sortDirection);
                }
            }
        }
    }

    private static function filtering()
    {
        if ($filter = request()->input('filter')) {
            foreach ($filter as $attribute => $like) {
                if (in_array($attribute, self::$filtering)) {
                    self::$_model->where($attribute, 'like', '%'.$like.'%');
                }
            }
        }
    }
}
