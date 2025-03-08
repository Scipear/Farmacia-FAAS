@extends('master')

@section('titulo', 'Panel de Administrador')
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
    <h1>Formulario de Surcursales</h1>
    <form>
        <label>Nombre</label>
        <input type="text" name="nombre"><br><br>
        <label>Estado</label>
        <input type="text" name="estado"><br><br>
        <label>Ciudad</label>
        <input type="text" name="ciudad"><br><br>
        <label>Zona</label>
        <input type="text" name="zona"><br><br>
        <label>Dirección</label>
        <input type="text" name="direccion"><br><br>
        <label>Correo</label>
        <input type="email" name="email"><br><br>
        <input type="submit" value="Enviar">
    </form>



@endsection