<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public static function getList()
    {
        return self::select('id', 'header')->where('status', true)->orderBy('pos')->get();
    }

    protected static function booted()
    {
        static::deleting(function($category) {
            foreach($category->items as $item) {
                $item->delete();
            }
        });
    }

    public function getCartItems($cartItems)
    {
        $ids = $cartItems->pluck('id')->all();
        $result = $this->items()
                    ->where('in_cart', true)
                    ->whereNotIn('id', $ids)
                    ->get();

        return $result;
    }
}
