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

    public function getCartItemsAttribute()
    {
        return $this->items()->where('in_cart', true)->get();
    }
}
