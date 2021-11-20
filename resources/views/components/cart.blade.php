<div class="cart__heading">
    Ваш заказ
</div>
<div class="cart__section">

    @if (Cart::count())
        <div class="cart__result">
            <div class="cart__result__list">
                @foreach (Cart::content() as $item)
                    @include('components.cart-item', ['item' => $item])
                @endforeach
            </div>
            <div class="cart__pricing">
                <div class="cart__text">
                    <span>Всего:</span>
                    <span id="total-price">
                        {{ Cart::total() }} ₽
                    </span>
                </div>
                <a href="">Заказать</a>
            </div>
        </div>
    @endif

    <div class="cart__offer">
        @foreach ($categories as $category)
            <div class="cart__cat__heading">
                {{ $category->header2 }}
            </div>
            <div class="cart__offer__list">
                @foreach ($category->cartItems as $offer)
                    {{--<x-offer-cart-item />--}}
                    @include('components.offer-cart-item')
                @endforeach
            </div>
        @endforeach
    </div>
</div>
