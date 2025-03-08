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
    <h1>Formulario de Laboratorio</h1>

        @csrf

        <label>Nombre</label>
        <input type="text" id ="nombre" name="nombre" required><br><br>

        <label>Ciudad</label>
        <input type="text" id= "ciudad" name="ciudad" required><br><br>

        <label>Dirección</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label>Teléfono</label>
        <input type="text" id="telefono1" name="telefono1" required><br><br>

        <label>Teléfono opcional</label>
        <input type="text" id="telefono2" name="telefono2"><br><br>

        <label>Correo</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <button>Enviar</button>
    </form>



@endsection