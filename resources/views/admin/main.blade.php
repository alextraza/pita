<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset("css/admin/sass/main.css") }}" type="text/css" media="screen" />
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
        </div>
        @include('admin.menu')
    </div>
    <div class="top-bar">

    </div>
    <div class="content">
        <div class="container">

            <div class="breadcrumb-top">
                <div class="header">
                    @yield('title')
                </div>
                <div class="breadcrumbs">
                    <ul>
                        <li>
                            <a href="{{ route('dashboard') }}">Заказы</a>
                        </li>
                        <li>
                            <span>@yield('title')</span>
                        </li>
                    </ul>
                </div>
            </div>
            @yield('content')

        </div>
    </div>

    <script src="{{ asset("js/admin/script.js") }}"></script>
</body>

</html>
