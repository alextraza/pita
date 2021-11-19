<header class="header">
    <div class="logo">
        <a href="/">Pita Pizza</a>
    </div>
    <div class="phone"><a href="tel:{{ str_replace([' ', '(', ')', '-'], '', \App\Models\Config::phone()) }}"><span>Телефон</span>{{ \App\Models\Config::phone() }}</a></div>
    <div class="address">
        <p><span>Адрес</span> {{ \App\Models\Config::address() }}</p>
    </div>

    <div class="resp__nav">
        <input id="menu__toggle" type="checkbox" />
        <label class="menu__btn" for="menu__toggle">
            <span></span>
        </label>
        <ul class="menu__box">
            <li class="menu__item"><a href="{{ route('page', ['slug' => 'about']) }}">О нас</a></li>
            <li class="menu__item"><a href="{{ route('page', ['slug' => 'delivery']) }}">Доставка и оплата</a></li>
            <li class="menu__item"><a href="{{ route('page', ['slug' => 'contacts'])  }}">Контакты</a></li>
            <li class="menu__item"> <a href="#">Вход<i data-feather="user"></i></a></li>
        </ul>
    </div>
    <div class="user__log">
        <a href="#"><i data-feather="user"></i></a>
    </div>
    
</header>
