🍕 *Новый заказ*

@foreach (Cart::content()->toArray() as $item)
 {{ $item['name'] }} - {{ $item['qty'] }}шт.

@endforeach

💰 *Общая сумма:* {{ \App\Models\Order::first()['full_price'] }}

💳 *Способ оплаты:* {{ \App\Models\Order::first()['payment'] }}

👤 *Имя:* {{ \App\Models\Order::first()['name'] }}

☎️ *Телефон:* {{ \App\Models\Order::first()['phone'] }}

📍 *Адрес:* {{ \App\Models\Order::first()['address'] }}

⏰ *Время доставки:*{{ \App\Models\Order::first()['delivery_time'] }}

📩 *Комментарий:* @if (\App\Models\Order::first()['comment']) {{ \App\Models\Order::first()['comment'] }}@else Нет @endif

