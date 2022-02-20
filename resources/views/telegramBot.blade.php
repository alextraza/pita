🍕 *Новый заказ*

@foreach (Cart::content()->toArray() as $item)
 {{ $item['name'] }} - {{ $item['qty'] }}шт.

@endforeach

💰 *Общая сумма:* {{ \App\Models\Order::get()->last()['full_price'] }} рублей.

💳 *Способ оплаты:* {{ \App\Models\Order::get()->last()['payment'] }}

👤 *Имя:* {{ \App\Models\Order::get()->last()['name'] }}

☎️ *Телефон:* {{ \App\Models\Order::get()->last()['phone'] }}

📍 *Адрес:* {{ \App\Models\Order::get()->last()['address'] }}

⏰ *Время доставки:*{{ \App\Models\Order::get()->last()['delivery_time'] }}

📩 *Комментарий:* @if (\App\Models\Order::get()->last()['comment']) {{ \App\Models\Order::first()['comment'] }}@else Нет @endif 


