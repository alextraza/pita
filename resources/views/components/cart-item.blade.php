<div class="cart__item">
    <div class="cart__item__image">
        <img src="{{ ImageHelper::thumb($item->options->image, 90, 70) }}" alt="">
    </div>

    <div class="cart__item__desc">
        <div class="cart__item__title">
            <span>{{ $item->options->category }}</span>
            {{ $item->name  }}
        </div>
    </div>
    <div class="cart__item__button">
        <div class="inline__button">
            <div class="cart-totals">
                <span>-</span>
                <input data-id="{{ $item->rowId }}" type="number" id="quantity{{ $item->id }}" value="{{ $item->qty }}" min="0">
                <span>+</span>
            </div>
        </div>
    </div>
    <div class="cart__item__price">
        {{ $item->price }} ₽
    </div>
    <div class="cart__item__del" data-id="{{ $item->rowId }}">
        <i data-feather="x-circle"></i>
    </div>
</div>
