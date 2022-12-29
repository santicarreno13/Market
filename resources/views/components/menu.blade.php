{{-- Menu --}}
 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Tienda</a>

        {{-- Hamburguesa --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registro</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->full_name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            @role('admin')
                            {{-- Users --}}
                            <a class="dropdown-item" href="{{ route('users') }}">Usuarios</a>

                            {{-- products --}}
                            <a class="dropdown-item" href="{{ route('products') }}">Productos</a>

                            @endrole
                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Logout</a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                        </div>

                      
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{-- Dashboard --}}


<div class="container-fluid">
                <div class="row">
                    <div class="barra-lateral col-12 col-sm-auto">
                        <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                            <a href="/Users"><i class="fas fa-home"></i><span>Usuarios</span></a>
                            <a href="/Products"><i class="fas fa-home"></i><span>Productos</span></a>
                            <a href="/Categories"><i class="fas fa-home"></i><span>Categorias</span></a>
                            <a href="/logout"><i class="fas fa-home"></i><span>Salir</span></a>
                        </nav>
                    </div>
                    {{-- Contenido --}}

                    </div>
</div>