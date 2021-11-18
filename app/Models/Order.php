<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUSES = [
        'new' => 'Новый',
        'pending' => 'Оплачен',
        'complete' => 'Выполнен',
        'canceled' => 'Отменен',
        'delivering' => 'Доставляется'
    ];

    const PAYMENTS = [
        'cash' => 'Наличными',
        'card' => 'Картой',
        'payed' => 'Оплачено'
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFullPriceAttribute()
    {
        return $this->orderItems->sum('price');
    }
}
