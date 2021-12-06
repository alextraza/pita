<div class="offer__item">
    <div class="offer__photo">

        <picture>
            <source srcset="{{ ImageHelper::thumb($offer->image, 180, 140, 'webp') }}" type="image/webp">
            <img src="{{ ImageHelper::thumb($offer->image, 180, 140, 'png') }}" width="180" height="140"
                alt="{{ $offer->header }}" type="image/png">
        </picture>
        
      
    </div>
    <div class="offer__content">
        
        <div class="offer__title">
            {{ $offer->header }}
        </div>
        <div class="offer__desc">
            {!! $offer->content !!}
        </div>
        <div class="offer__btn">
            <a href="{{ route('cart.offer', ['id' => $offer->id]) }}">В корзину</a> <span>{!! $offer->price !!} ₽</span>
        </div>
    </div>
    
</div>
