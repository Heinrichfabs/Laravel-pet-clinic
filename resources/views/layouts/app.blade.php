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

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body
    style="background-image:linear-gradient(rgba(212, 212, 212, 0.1),rgba(212,212,212,0.1)), url(https://wallpapercave.com/wp/B1sODrM.jpg); background-size:cover; overflow-x: hidden;">
    @include('sweetalert::alert')
    <div id="app"></div>

    <nav
        class="flex justify-between items-center px-10 py-6 text-white navbar navbar-expand-md navbar-light bg-gray-800 shadow-sm">
        <div class="container">

            <a href="{{ URL('data') }}">
                <div class="px-1 grid grid-flow-col font-bold text-2xl">
                    <h1 class="px-1 font-bold bg-black border-black border-4 rounded-l-lg">Pet</h1>
                    <h1 class="pr-1 bg-yellow-600 border-yellow-600 border-4 text-black rounded-r-lg">Clinic</h1>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ms-auto text-2xl ml-48">
                    <button> <a href="{{ URL('dashboard') }}">
                            <h5 class="mr-4">Home</h5>
                        </a></button>
                    <button> <a href="{{ URL('animals') }}">
                            <h5 class="mr-4">Animal</h5>
                        </a></button>
                    <button><a href="{{ URL('customer') }}">
                            <h5 class="mr-4">Customer</h5>
                        </a></button>
                    <button><a href="{{ URL('service') }}">
                            <h5 class="mr-4">Service</h5>
                        </a></button>
                    <button><a href="{{ URL('consultation') }}">
                            <h5 class="mr-4">Consultations</h5>
                        </a></button>
                    <button><a href="{{ URL('transaction') }}">
                            <h5 class="mr-4">Transaction</h5>
                        </a></button>
                    <button><a href={{ URL('personnel') }}>
                            <h5 class="mr-4">Personnel</h5>
                        </a></button>
                    <li class="nav-item">
                        <a href="{{ route('transaction.shoppingCart') }}">
                            <i class="fa fa-paw" aria-hidden="true"></i> Pet Transaction
                            <span class="text-xs text-white">{{ Session::has('cart') ? Session::get('cart')->totalCost :
                                '' }}</span>
                        </a>
                    </li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto text-2xl">
                    <!-- Authentication Links -->

                    @guest
                    @if (Route::has('personnel.signin'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('personnel.signin') }}">Sign In</a>
                    </li>
                    @endif

                    @if (Route::has('personnel.signup'))
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('personnel.signup') }}">Sign Up</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->full_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('personnel.logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ route('personnel.logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <main class="py-4">
        @yield('content')
    </main>
    </div>
</body>

</html>