@extends('master')

@section('titulo', 'Panel de Administración')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <div class="container">
            <h1>Bienvenido al Panel de Administración</h1>
            <p>¡Has iniciado sesión como administrador!</p>
        </div>
        <a  class="botonIr" href="/admin/sucursales">Gestionar Sucursales</a><br><br><br>
        <a  class="botonIr" href="/admin/laborat">Gestionar Laboratorios</a><br><br><br>
        <a  class="botonIr" href="/admin/empleados">Gestionar Empleados</a><br><br><br>
        <a  class="botonIr" href="/admin/cargo">Gestionar Cargos</a><br><br><br>
@endsection