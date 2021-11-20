<div class="cat__nav__sec">
    <div class="cat__nav">
        @foreach($categories as $category)
            <a class="cat__nav__con active" href="#{{ $category->slug }}">
                <span class="nav__con__icon">
                    @if ($category->image)
                        <img src="{{ ImageHelper::thumb($category->image, 32, 32) }}" alt="" />
                    @else
                        {{ $category->icon }}
                    @endif
                </span>
                {{ $category->header }}
            </a>
        @endforeach
    </div>
    <div class="cat__nav__cart">
        @include('components.minicart')
    </div>
</div>
