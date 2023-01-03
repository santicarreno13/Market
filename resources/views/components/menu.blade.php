{{-- Menu --}}
 <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">Tienda</a>

        {{-- Hamburguesa --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav me-auto">

            </ul>


            <ul class="navbar-nav ms-auto">

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
                    <a href="#" id="cart navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i class="fa fa-shopping-cart"></i> Carrito <span class="badge">{{ $shopping_cart->quantity_of_products() }}</span></a>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        @include('layouts._mini_cart')
                    </div>
                </li>
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

                            {{-- Categories --}}
                            <a class="dropdown-item" href="{{ route('categories') }}">Categorias</a>

                            @endrole
                            {{-- Logout --}}
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Salir</a>

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
