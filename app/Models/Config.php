<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['key'];

    public static function email()
    {
        if ($model = self::where('key', 'email')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function address()
    {
        if ($model = self::where('key', 'address')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function phone()
    {
        if ($model = self::where('key', 'phone')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function title()
    {
        if ($model = self::where('key', 'title')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function description()
    {
        if ($model = self::where('key', 'description')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function map()
    {
        if ($model = self::where('key', 'map')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function gtm()
    {
        if ($model = self::where('key', 'gtm')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function yam()
    {
        if ($model = self::where('key', 'yam')->first()) {
            return $model->content;
        }
        return false;
    }

    public static function jivosite()
    {
        if ($model = self::where('key', 'jivosite')->first()) {
            return $model->content;
        }
        return false;
    }
}
