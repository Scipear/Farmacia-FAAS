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
    <form method="POST" action="{{ route('admin.formSuc') }}">
        <label>Nombre</label>
        <input type="text" id ="nombreSuc" name="nombreSuc" required><br><br>
        <label>Estado</label>
        <input type="text" id= "estadoSuc" name="estadoSuc" required><br><br>
        <label>Ciudad</label>
        <input type="text" id= "ciudadSuc" name="ciudadSuc" required><br><br>
        <label>Zona</label>
        <input type="text" id= "zonaSuc" name="zonaSuc" required><br><br>
        <label>Dirección</label>
        <input type="text" id="direccionSuc" name="direccionSuc" required><br><br>
        <label>Correo</label>
        <input type="email" id="emailSuc" name="emailSuc"required><br><br>
        <input type="submit" value="Enviar">
    </form>



@endsection