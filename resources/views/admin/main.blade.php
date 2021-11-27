<!DOCTYPE html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("css/admin/simplemde.min.css") }}" type="text/css" media="screen" />
    <link rel="stylesheet" href="{{ asset("css/admin/main.css") }}" type="text/css" media="screen" />
</head>

<body>
    <div class="menu">
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <object data="{{ asset("images/pizza.svg") }}" type="image/svg+xml" width="24px">
                    <img src="{{ asset("images/pizza.svg") }}" alt="" />
                </object>
                PITA-PIZZA
            </a>
            <a class="menu__close" href="#">&times;</a>
        </div>
        @include('admin.menu')
    </div>
    <div class="overlay"></div>
    <div class="top-bar">
        <a class="menu-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
        <div class="left">
            @if ($message = Session::get('success'))
                <div class="session__msg">
                    {{ $message }}
                </div>
            @endif
        </div>
        <div class="right">
            <div class="cart">
                <a href="{{ route('dashboard', ['filter[status]' => 'new']) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart ficon"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                    @if ($newOrder->count())
                        <span>{{ $newOrder->count() }}</span>
                    @endif
                </a>
            </div>
            <a class="edit-users" href="{{ route('user.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                <span>{{ Auth::user()->name }}</span>
            </a>
            <a class="logout" href="{{ route('signout') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-power me-50"><path d="M18.36 6.64a9 9 0 1 1-12.73 0"></path><line x1="12" y1="2" x2="12" y2="12"></line></svg>
                <span>Выйти</span>
            </a>
        </div>
    </div>
    <div class="content">
        <div class="content__shadow"></div>
        <div class="container">

            @yield('breadcrumb')
            @yield('content')

        </div>
        <footer>
            <div class="container">
                Администрирование сайта 🄯 Copyleft - {{ date('Y') }}г.
            </div>
        </footer>
    </div>

    <script src="{{ asset("js/admin/slimselect.min.js") }}"></script>
    <script src="{{ asset("js/admin/simplemde.min.js") }}"></script>
    <script src="{{ asset("js/admin/axios.min.js") }}"></script>
    <script src="{{ asset("js/admin/script.js") }}"></script>
</body>

</html>
