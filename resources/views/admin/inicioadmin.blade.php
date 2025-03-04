@extends('master')

@section('titulo', 'Panel de Administrador')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/">inicioadmin</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <div class="container">
            <h1>Bienvenido al Panel de Administración</h1>
            <p>¡Has iniciado sesión como administrador!</p>
        </div>
        <b>Gestionar Surcursales</b>
        <button>Ir</button><br><br>
        <b>Gestionar Laboratorios</b>
        <button>Ir</button><br><br>
        <b>Gestionar Empleados</b>
        <button>Ir</button><br><br>
        <b>Gestionar Medicina</b>
        <button>Ir</button><br><br>
@endsection