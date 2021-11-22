<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'street',
        'house',
        'entrance',
        'apartment',
        'floor',
        'code',
    ];

    public function getFullAddressAttribute()
    {
        return $this->setAddress($this);
    }

    public static function getFullAddress($obj)
    {
        return self::setAddress($obj);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    private function setAddress($obj)
    {
        $result = [];
        if ($obj->street) {
            $result[] = 'ул.' . $obj->street;
        }
        if ($obj->house) {
            $result[] = 'д.' . $obj->house;
        }
        if ($obj->apartment) {
            $result[] = 'кв.' . $obj->apartment;
        }
        if ($obj->entrance) {
            $result[] = $obj->entrance . ' подъезд';
        }
        if ($obj->floor) {
            $result[] = $obj->floor . ' этаж';
        }

        if ($obj->code) {
            $result[] = 'код домофона: ' . $obj->code;
        }

        if ($result) {
            return implode(', ', $result);
        }

    }
}
