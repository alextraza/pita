<?php

namespace App\Admin\Models;

trait SearchTrait
{
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
                if (self::isSorting($attribute) && $sortDirection) {
                    self::$_model->orderBy($attribute, trim($sortDirection));
                }
            }
        }
    }

    private static function filtering()
    {
        if ($filter = request()->input('filter')) {
            foreach ($filter as $attribute => $like) {
                if (self::isFiltering($attribute) && $like) {
                    self::$_model->where($attribute, 'like', '%'.$like.'%');
                }
            }
        }
    }

    public static function isSorting($attribute)
    {
        return in_array($attribute, self::$sorting);
    }

    public static function isFiltering($attribute)
    {
        return in_array($attribute, self::$filtering);
    }
}
