@extends('master')

@section('titulo', 'Panel de Administración')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">Inicio</a>
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
        <b>Gestionar surcursales</b> 
        <a  class="botonIr" href="/admin/sucursales">Ir</a><br><br><br>
        <b>Gestionar laboratorios</b>
        <a  class="botonIr" href="/admin/laborat">Ir</a><br><br><br>
        <b>Gestionar empleados</b>
        <a  class="botonIr" href="/admin/empleados">Ir</a><br><br><br>
        <b>Gestionar cargo de empleados</b>
        <a  class="botonIr" href="/admin/cargo">Ir</a><br><br><br>
        <b>Gestionar medicina</b>
        <a  class="botonIr" href="/admin/medicina">Ir</a><br><br><br>
        <b>Gestionar medicamento</b>
        <a  class="botonIr" href="/admin/medicamento">Ir</a><br><br><br>
        <b>Gestionar tipo de presentación</b>
        <a  class="botonIr" href="/admin/presentacion">Ir</a><br><br><br>
        <b>Gestionar acción terapéutica</b>
        <a  class="botonIr" href="/admin/acciont">Ir</a><br><br><br>
        <b>Gestionar monodroga</b>
        <a  class="botonIr" href="/admin/monodroga">Ir</a><br><br><br>
@endsection