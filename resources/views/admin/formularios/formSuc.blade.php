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
        <input type="text" name="nombre" required><br><br>
        <label>Estado</label>
        <input type="text" name="estado"required><br><br>
        <label>Ciudad</label>
        <input type="text" name="ciudad"required><br><br>
        <label>Zona</label>
        <input type="text" name="zona"required><br><br>
        <label>Dirección</label>
        <input type="text" name="direccion"required><br><br>
        <label>Correo</label>
        <input type="email" name="email"required><br><br>
        <input type="submit" value="Enviar">
    </form>



@endsection