<div class="menu__block">
    @foreach ($categories as $category)
        <div class="heading" id="{{ $category->slug }}">
            {{ $category->header }} <span>
                @if ($category->image)
                    <img src="{{ ImageHelper::thumb($category->image, 66, 66) }}" alt="" />
                @else
                    {{ $category->icon }}
                @endif
            </span>
        </div>
        <div class="menu__block__con">
            @foreach ($category->items as $item)
                {{-- Card Active --}}
                {{-- <x-card-active /> --}}
                @include('components.card-active', ['item' => $item])
            @endforeach
            {{-- Card end --}}
        </div>

    @endforeach
    <div class="cat__nav__cart mobile">
        @if (Cart::count())
            @include('components.minicart')
        @endif
    </div>
</div>


