<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const STATUSES = [
        'new' => 'Новый',
        'pending' => 'Оплачен',
        'delivering' => 'Доставляется',
        'complete' => 'Выполнен',
        'canceled' => 'Отменен',
    ];

    const PAYMENTS = [
        'cash' => 'Наличными',
        'card' => 'Картой',
        'payed' => 'Оплачено',
        'canceled' => 'Неудачная оплата',
    ];

    protected static function booted()
    {
        static::deleting(function($order) {
            foreach($order->orderItems as $orderItem) {
                $orderItem->delete();
            }
        });
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function getFullPriceAttribute()
    {
        $sum = 0;
        foreach($this->orderItems as $item){
            $sum += $item->count * $item->price;
        }

        return $sum;
    }
}
