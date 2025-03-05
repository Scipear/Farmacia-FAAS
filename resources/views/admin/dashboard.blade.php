@extends('master')

@section('titulo', 'Panel de Administración')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">inicioadmin</a>
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
        <a  class="botonIr" href="/admin/sucursales">Ir</a><br><br><br>
        <b>Gestionar Laboratorios</b>
        <a  class="botonIr" href="/admin/laborat">Ir</a><br><br><br>
        <b>Gestionar Empleados</b>
        <a  class="botonIr" href="/admin/empleados">Ir</a><br><br><br>
        <b>Gestionar Medicina</b>
        <button>Ir</button><br><br>
@endsection