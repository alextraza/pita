<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function items()
    {
        return $this->hasMany(Items::class);
    }

    public static function getList()
    {
        return self::select('id', 'header')->where('status', true)->orderBy('pos')->get();
    }
}
