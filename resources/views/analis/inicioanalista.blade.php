@extends('master')

@section('titulo', 'Analista de Compras inicio')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/analis/inicioanalista">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>

@section('contenido')

        <div class="container">
            <h1>Bienvenido al Panel de Analita de compras</h1>
            <p>¡Has iniciado sesión como Analita de compras!</p>
        </div>

        <b>Gestionar pedidos</b>
        <a  class="botonIr" href="">Ir</a><br><br><br>
        <b>Gestionar compras</b>
        <a  class="botonIr" href="">Ir</a><br><br><br>
        <b>Ver cuentas por pagar</b>
        <a  class="botonIr" href="">Ir</a><br><br><br>
        
@endsection