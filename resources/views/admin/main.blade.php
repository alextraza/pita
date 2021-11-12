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
                PIZZA
            </a>
        </div>
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

</body>

</html>
