@extends('master')

@section('titulo', 'Panel de Gerente')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>  
</ul>
</header>

@section('contenido')

        <div class="container">
            <h1>Bienvenido al Panel de Gerente </h1>
            <p>¡Has iniciado sesión como gerente!</p><br>
        </div>
    
    <a class="botonIr" href="/gerente/empleados">Gestionar empleados</a><br><br><br>

    <a class="botonIr" href="/gerente/pedidos">Gestionar pedidos</a><br><br><br>

    <a class="botonIr" href="/gerente/compras">Gestionar compras</a><br><br><br>

    <a class="botonIr" href="/gerente/laboratorios">Gestionar laboratorios</a><br><br><br>

    <a class="botonIr" href="/gerente/laboratoriosAfi">Laboratorios afiliados</a><br><br><br>

    <a class="botonIr" href="/gerente/afiliarlab">Afiliar labortorio</a><br><br><br>

    <a class="botonIr" href="/gerente/cuentasxpagar">Ver cuentas por pagar</a><br><br><br>

@endsection