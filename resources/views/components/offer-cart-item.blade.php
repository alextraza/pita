<div class="offer__item">
    <div class="offer__photo">
        <img src="{{ ImageHelper::thumb($offer->image, 90, 70) }}" alt="">
    </div>
    <div class="offer__content">
        
        <div class="offer__title">
            {{ $offer->header }}
        </div>
        <div class="offer__desc">
            {!! $offer->content !!}
        </div>
        <div class="offer__btn">
            <a data-id="{{ $offer->id }}" href="#">В корзину</a>
        </div>
    </div>
    
</div>
