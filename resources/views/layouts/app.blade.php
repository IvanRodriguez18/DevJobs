<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/all.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!--Estilos CSS de CDN herramientas externas-->
    @yield('styles')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200 min-h-screen leading-none">
    @if (session('success'))
        <div class="bg-teal-500 text-white text-center font-bold uppercase p-8">{{ session('success') }}</div>
    @endif
    <div id="app">
        <nav class="bg-gray-800 py-5 shadow-md">
            <div class="container mx-auto md:px-0">
               <div class="flex items-center justify-around">
                    <a class="text-2xl text-white hover:text-gray-400" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }} <i class="fas fa-briefcase"></i>
                    </a>

                    <nav class="flex-1 text-right">
                        @guest
                                <a class="text-white no-underline hover:text-gray-400 p-4" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="text-white no-underline hover:text-gray-400 p-4" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                            @else
                                <span class="text-gray-400 text-sm pr-4">{{ Auth::user()->name }}</span>

                                <a href="{{ route('notificaciones') }}" class="bg-teal-500 rounded-full text-sm text-white font-bold mr-2 px-2">
                                    {{ Auth::user()->unreadNotifications->count() }}
                                </a>

                                <a class="no-underline text-gray-400 hover:text-white text-sm p-4" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                        @endguest
                    </nav>
               </div>
            </div>
        </nav>
        <div class="bg-gray-700">
            <nav class="container mx-auto flex flex-col text-center md:flex-row space-x-1">
                @yield('navegacion')
            </nav>
        </div>
        <main class="container mx-auto">
            @yield('content')
        </main>
    </div>
    @yield('scripts')
</body>
</html>
