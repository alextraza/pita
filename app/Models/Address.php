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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
