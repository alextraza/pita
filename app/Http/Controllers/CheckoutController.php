<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrder;
use App\Models\{Order, OrderItem, Address};
use Cart;
use Illuminate\Http\Request;
use YooKassa\Client;
use YooDassa\Model\{NotificationEventType, NotificationSucceeded, NotificationWaitingForCapture};

class CheckoutController extends Controller
{
    /**
    * Show checkout page
    *
    * @return view
    */
    public function index()
    {
        if (! Cart::count()) {
            return redirect(route('cart.index'));
        };
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

        Cart::destroy();

        if ($request->tabset_2 == 'online') {
            return redirect()->away($this->createPayment($order));
        }
        return redirect(route('index'))->withSuccess('Спасибо за заказ!');
    }

    private function getFullAddress($request)
    {
        if ($request->delivery == 'myself') {
            return 'Самовывоз';
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

    private function getClient()
    {
        $client = new Client();
        $client->setAuth(config('services.yookassa.shop_id'),
                         config('services.yookassa.secret'));
        return $client;
    }

    private function createPayment($order)
    {
        $client = $this->getClient();
        $payment = $client->createPayment(
            [
                'amount' => [
                    'value' => (float)$order->full_price,
                    'currency' => 'RUB',
                ],
                'confirmation' => [
                    'type' => 'redirect',
                    'return_url' => route('payment.callback'),
                ],
                'metadata' => [
                    'order_id' => $order->id,
                ],
                'capture' => false,
                'description' => 'Заказ №'.$order->id,
            ],
            uniqid('', true)
        );

        return $payment->getConfirmation()->getConfirmationUrl();
    }

    public function callback(Request $request)
    {
        $source = file_get_content('php://input');
        $requestBody = json_decode($source, true);
        $notification = ($requestBody['event'] == NotificationEventType::PAYMENT_SUCCEEDED)
        ? new NotificationSucceeded($requestBody)
        : new NotificationWaitingForCapture($requestBody);
        $payment = $notification->getObject();
        if (isset($payment->status) && $payment->status === 'succeeded') {
            if ((bool)$payment->paid === true) {
                $metadata = (object)$payment->metadata;
                if (isset($metadata->order_id)) {
                    $order = Order::where('id', (int)$metadata->order_id)->first();
                    $order->payed = 'payed';
                    $order->status = 'pending';
                    $order->save();
                }
            }
        }
        return redirect(route('index'))->withSuccess('Спасибо за заказ!');
    }
}
