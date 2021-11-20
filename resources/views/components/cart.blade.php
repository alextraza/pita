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
                        {{ Cart::total() }}
                    </span> ₽
                </div>
                <a href="">Заказать</a>
            </div>
        </div>
 
    @endif
    @if (!Cart::count())
    <div class="cart__empty">
        <div class="cart__empty__photo">
            <object type="image/svg+xml" data="{{asset('images/empty.svg')}}"  >
                <img src="{{asset('images/empty.png')}}">
             </object>
         
        </div>
        <div class="cart__empty__text">
            <div class="empty__header">Привет! Ты ещё ничего не выбрал.</div> 
            <div class="empty__text">Мы делаем классную пиццу, десерты и закуски, которые тебе точно понравятся. Обязательно выбери что-нибудь на свой вкус. И не забудь про напитки!</div> 
            <div class="empty__button"><a href="{{route('index')}}">Выбрать</a></div> 
        </div>

    </div>
    @endif
    
    <div class="cart__offer">
        @foreach ($categories as $category)
            @if (($offers = $category->getCartItems(Cart::content())) && $offers->count())
                <div class="cart__cat__heading">
                    {{ $category->header2 }}
                </div>
                <div class="cart__offer__list">
                    @foreach ($offers as $offer)
                        {{--<x-offer-cart-item />--}}
                        @include('components.offer-cart-item')
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
</div>
