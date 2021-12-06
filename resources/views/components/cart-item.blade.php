<div class="cart__item">
    <div class="cart__item__image">
        <picture>
            <source srcset="{{ ImageHelper::thumb($item->options->image, 180, 138, 'webp') }}" type="image/webp">
            <img src="{{ ImageHelper::thumb($item->options->image, 180, 138, 'png') }}" width="580" height="446"
                alt="{{ $item->options->category }} {{ $item->name }}" type="image/png">
        </picture>


    </div>

    <div class="cart__item__desc">
        <div class="cart__item__title">
            <span>{{ $item->options->category }}</span>
            {{ $item->name }}
        </div>
    </div>
    <div class="cart__item__button">
        <div class="inline__button">
            <div class="cart-totals">
                <span class="count-minus">-</span>
                <span class="count-plus">+</span>
                <input data-id="{{ $item->rowId }}" type="number" id="quantity{{ $item->id }}"
                    value="{{ $item->qty }}" class="ch_count" min="0">
            </div>
        </div>
    </div>
    <div class="cart__item__price" id="p{{ $item->rowId }}">
        <span>{{ $item->price * $item->qty }}</span> ₽
    </div>
    <div class="cart__item__del" data-id="{{ $item->rowId }}">
        <svg xmlns="https://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="feather feather-x-circle">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="15" y1="9" x2="9" y2="15"></line>
            <line x1="9" y1="9" x2="15" y2="15"></line>
        </svg>
    </div>
</div>
