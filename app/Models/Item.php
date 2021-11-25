<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cart;

class Item extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function getInCartAttribute()
    {
        $id = $this->id;
        if (self::getCartRowId($this->id)->first()) {
            return true;
        }
        return false;
    }

    public static function getCartRowId($id)
    {
        $cartContent = Cart::content();
        $result = $cartContent->filter(function($item) use($id){
            return ($item->id == $id) || ($item->id == $id . '_1');
        });

        return $result;
    }

}
