<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Документооборот - @yield('title')
        {{--{{ config('app.name', 'Laravel') }}--}}


    </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap3.css')}}">
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">

</head>
<body style="background: ghostwhite;">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{--{{ config('app.name', 'Laravel') }}--}}
                    Документооборот
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" style="float: left;">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto"  style="float: right;">
                        <!-- Authentication Links -->
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Вход') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a></li>
                        @else
                            @if(Auth::user()->is_admin)
                                <li><a class="nav-link" href="{{url('admin/tickets')}}"><i class="fa fa-btn fa-newspaper-o"></i> Документы</a></li>
                                <li><a class="nav-link" href="{{url('my_tickets')}}"> <i class="fa fa-btn fa-inbox"></i> Мои докумменты</a></li>
                                <li><a class="nav-link" href="{{url('new_ticket')}}"><i class="fa fa-btn fa-plus"></i> Создать</a></li>
                                <li><a class="nav-link" href="{{route('settings')}}"><i class="fa fa-cog" aria-hidden="true"></i> Настройки</a></li>
                            @else
                                <li><a class="nav-link" href="{{url('my_tickets')}}"><i class="fa fa-btn fa-inbox"></i> Мои докумменты</a></li>
                                <li><a class="nav-link" href="{{url('new_ticket')}}"><i class="fa fa-btn fa-plus"></i> Создать</a></li>
                            @endif
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-btn fa-user-circle-o"></i>
                                    {{ Auth::user()->name }}
                                    {{--<span class="caret"></span>--}}
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-btn fa-sign-out"></i>
                                        {{ __('Выход') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap3.js')}}"></script>
@yield('js')
</body>
<footer>
<div class="footer">


    <div class="text-lg-center">
        <i class="fa fa-copyright"></i> 2018 г. written by Rkislov
    </div>


</div>
</footer>
</html>

