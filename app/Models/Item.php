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
        $cartContent = Cart::content();
        $id = $this->id;
        $result = $cartContent->filter(function($item) use($id){
            return ($item->id == $id) || ($item->id == $id . '_1');
        });

        if ($result->first()) {
            return true;
        }
        return false;
    }

}
