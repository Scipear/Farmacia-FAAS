@extends('master')

@section('titulo', 'Analista de Compras')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/analista/inicioAnalista">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>

@section('contenido')

        <div class="container">
            <h1>Bienvenido al Panel de Analista de compras</h1>
            <p>¡Has iniciado sesión como Analista de compras!</p>
        </div>

        <a  class="botonIr" href="pedidos">Gestionar Pedidos</a><br><br><br>
        <a  class="botonIr" href="compras">Gestionar Compras</a><br><br><br>
        <a  class="botonIr" href="cuentasxpagar">Ver Cuentas por Pagar</a><br><br><br>
        
        
@endsection