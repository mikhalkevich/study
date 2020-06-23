<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
@stack('styles')
<!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <script src="{{asset('js/jquery.cookie.js')}}"></script>
    <script src="{{asset('js/cart.js')}}"></script>

</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{__('menu.catalog')}}
                    </button>
                    <div class="dropdown-menu" id="topmenu" aria-labelledby="dropdownMenuButton">
                        @foreach($v_catalogs as $one)
                            <a class="dropdown-item" id="one{{$one->id}}"
                               href="{{asset('catalog/'.$one->id)}}">{{$one->name}}</a>
                        @endforeach
                    </div>
                </div>
                <div id="empty">
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <li>
                        <a href="{{asset('best')}}" class="nav-link">{{__('menu.best')}}</a>
                    </li>
                    <li>
                        <div id="basket">
                            <table id="bascets">
                                <tbody>
                                <tr style="display: none;" class="hPb">
                                    <td>Выбрано:</td>
                                    <td><span id="totalGoods">0</span> товаров</td>
                                    <td>Сумма: &asymp; </td>
                                    <td><span id="totalPrice">0</span> руб.</td>
                                </tr>
                                <tr style="display: table-row;" class="hPe">
                                    <td colspan="2">{{__('menu.empty')}}</td>
                                </tr>
                                <tr>
                                    <td><a style="display: none;" id="clearBasket" href="#">Очистить</a></td>
                                    <td><a style="display: none;" id="checkOut" href="{{asset('basket')}}">Оформить</a></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    @guest
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>

                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{asset('parse')}}">Парсинг</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<div class="footer">
    <a href="{{asset('/lang?lang=ru')}}">Русский</a>
    <a href="{{asset('/lang?lang=en')}}">English</a>
</div>
@stack('scripts')
</body>
</html>
