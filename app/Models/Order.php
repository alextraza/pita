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

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class);
    }
}
