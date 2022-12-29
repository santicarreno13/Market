@role('admin')
@extends('layouts.app')

@section('content')
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
                    <main class="main col">
                        <div class="row justify-content-center align-content-center text-center">
                            <div class="columna col-lg-6">
                                <selection class="d-flex justify-content-center flex-wrap">
                                    <h1 class="d-flex justify-content-center ">Bievenido {{ Auth::user()->full_name}}</h1>
                                </selection>
                                <selection class="d-flex justify-content-center flex-wrap">
                                    <a href="/" class="btn btn-primary d-flex">Ir a tienda</a>
                                </selection>
                            </div>

                        </div>

                    </main>
                </div>
            </div>
@endsection
@endrole


