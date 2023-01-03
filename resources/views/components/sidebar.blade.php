@role('admin')

{{-- Barra lateral --}}
<aside>

<div class="menu-lateral container-fluid">
    <div class="row">
        <div class="barra-lateral col-12 col-sm-auto">
            <nav class="menu d-flex d-sm-block justify-content-center flex-wrap">
                <a href="/Users"><span>Usuarios</span></a>
                <a href="/Products"><span>Productos</span></a>
                <a href="/Categories"><span>Categorias</span></a>
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">Salir</a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </nav>
        </div>
        {{-- Contenido --}}

    </div>
</div>

</aside>
@endrole