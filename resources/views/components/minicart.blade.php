<div class="cart">
<a href="{{ route('cart.index') }}">
  
        <div class="cart__name"><span>Всего: </span>@if (Cart::total()){{ Cart::total() }} ₽ @else Корзина @endif</div>
        <div class="cart__icon" >
        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="">
            <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
            <line x1="3" y1="6" x2="21" y2="6"></line>
            <path d="M16 10a4 4 0 0 1-8 0"></path>
        </svg>
        @if (Cart::count())
            <span>{{ Cart::count() }}</span>
        @endif
    </div>
</a>
</div>