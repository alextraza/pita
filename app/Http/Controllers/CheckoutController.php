<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\{Order, OrderItem, Address};
use App\Http\Requests\StoreOrder;

class CheckoutController extends Controller
{
    /**
    * Show checkout page
    *
    * @return view
    */
    public function index()
    {
        return view('checkout');
    }

    /**
    * Store order from checkout
    *
    * @param App\Http\Request\StoreOrder $request
    */
    public function store(StoreOrder $request)
    {
        $order = new Order();
        $order->address = $this->getFullAddress($request);
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->comment = $request->comment;
        $order->delivery_time = $request->delivery_time == 'time' ? $request->chose_time : $request->delivery_time;
        $order->status = 'new';
        foreach (Cart::content() as $orderItem) {
            $orderItems[] = $this->setOrderItems($orderItem);
        }
        if ($orderItems) {
            $order->save();
            $order->orderItems()->saveMany($orderItems);
        }
        echo "Теперь плати";
    }

    private function getFullAddress($request)
    {
        if ($request->delivery == 'myself') {
            return 'Самодоставка';
        }
        if ($request->client_address && $request->client_address != 'on') {
            return $request->client_address;
        }

        return Address::getFullAddress($request);
    }

    private function setOrderItems($item)
    {
        $orderItem = new OrderItem();
        $orderItem->image = $item->options->image;
        $orderItem->header = $item->name;
        $orderItem->price = $item->price;
        $orderItem->count = $item->qty;
        return $orderItem;
    }
}
