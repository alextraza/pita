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
        echo ('sldkfj');
        $result = [];
        if ($this->street) {
            $result[] = 'ул.' . $this->street;
        }
        if ($this->house) {
            $result[] = 'д.' . $this->house;
        }
        if ($this->apartment) {
            $result[] = 'кв.' . $this->apartment;
        }
        if ($this->entrance) {
            $result[] = $this->entrance . ' подъезд';
        }
        if ($this->floor) {
            $result[] = $this->floor . ' этаж';
        }

        if ($this->code) {
            $result[] = 'код домофона: ' . $this->code;
        }

        if ($result) {
            return implode(', ', $result);
        }

        return false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
