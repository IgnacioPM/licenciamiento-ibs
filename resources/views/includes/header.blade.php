{{-- <!-- Header -->
<header id="header">
    <div class="logo">
        <a href="/public">Licenciamiento IBS</a>
    </div>
</header> --}}
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
					
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        {{-- MANTENIMIENTO --}}
                                                    
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Mantenimiento
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item">
                                        <a href="{{ url('/solicitud') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Solicitud</a> 
                                    </a>
                                    <a class="dropdown-item">
                                        <a href="{{ url('/contrato') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Contrato</a> 
                                    </a>
                                    <a class="dropdown-item">
                                        <a href="{{ url('/comercio') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Comercio</a> 
                                    </a>
                                    <a class="dropdown-item">
                                        <a href="{{ url('/cliente') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Cliente</a> 
                                    </a>
                                    <a class="dropdown-item">
                                        <a href="{{ url('/cedula') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Cedula</a> 
                                    </a>
                                    <a class="dropdown-item">
                                        <a href="{{ url('/capacitacion') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Capacitacion</a> 
                                    </a>
                                </div>
                            </li>
                    </ul>
                </div>
            </div>
        </nav>