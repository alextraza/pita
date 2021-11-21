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
            <li class="menu__item">
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg></a>
                <ul>
                    @guest
                    <li>
                        <a href="/login">Войти</a>
                    </li>
                    <li>
                        <a href="/register">Регистрация</a>
                    </li>
                    @endguest
                    @auth
                    <li>
                        <a href="/user">Кабинет</a>
                    </li>
                    <li>
                        <a href="{{ route('signout') }}">Выйти</a>
                    </li>
                    @endauth
                </ul>
            </li>
        </ul>
    </div>
    <div class="user__log">
        <a href="#">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
        </a>
    </div>
    
</header>
