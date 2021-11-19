<div class="item">
    <div class="item__img__block">
        <img src="{{ ImageHelper::thumb($item->image, 400, 310) }}" alt="">
        <button class="item__button add-to-cart" data-id="{{ $item->id }}" type="button"><i data-feather="plus"></i></button>
    </div>
    <div class="item__content">

        <div class="card__heading"><span class="card__cat">{{ $item->category->header }}</span> {{ $item->header }}</div>

        <div class="card__desc">{{ $item->content }}</div>
        @if ($item->has_alt)
        <input name="has_alt" id="switch{{ $item->id }}" type="checkbox">
        <div class="pizza__size">
            <div class="pizza__item">
                <label for="switch{{ $item->id }}" data-standart="Маленькая" data-big="Большая"></label>
            </div>
        </div>
        @endif

        <div class="main__var">
            <div class="card__comp">
                <div>
                    @if ($item->weight)
                    <span>Вес:</span> {{ $item->weight }} г.
                    @endif
                    @if ($item->proteins)
                    <span>Белки:</span> {{ $item->proteins }} г.
                    @endif
                    @if ($item->fats)
                    <span>Жиры:</span> {{ $item->fats }} г.
                    @endif
                    @if ($item->carbo)
                    <span>Углеводы:</span> {{ $item->carbo }} г.
                    @endif
                    @if ($item->capacity)
                    <span>Объем:</span> {{ $item->capacity }} мл.
                    @endif
                </div>
                @if ($item->energy)
                    <div>
                        <span>Энергетическая ценность:</span> {{ $item->energy }} ккал на 100 г
                    </div>
                @endif
            </div>
            <div class="card__price">{{ $item->price }} ₽</div>
        </div>
        @if ($item->has_alt)
        <div class="alt__var">
            <div class="card__comp">
                <div>
                    @if ($item->weight_alt)
                    <span>Вес:</span> {{ $item->weight_alt }} г.
                    @endif
                    @if ($item->proteins)
                    <span>Белки:</span> {{ $item->proteins }} г.
                    @endif
                    @if ($item->fats)
                    <span>Жиры:</span> {{ $item->fats }} г.
                    @endif
                    @if ($item->carbo)
                    <span>Углеводы:</span> {{ $item->carbo }} г.
                    @endif
                </div>
                @if ($item->energy)
                    <div>
                        <span>Энергетическая ценность:</span> {{ $item->energy }} ккал на 100 г
                    </div>
                @endif

            </div>
            <div class="card__price">{{ $item->price_alt }} ₽</div>
        </div>
        @endif
    </div>
</div>
