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
    <form method="POST" action="/sucursales">

        @csrf

        <label>Nombre</label>
        <input type="text" id ="nombre" name="nombre" required><br><br>

        <label>Estado</label>
        <input type="text" id= "estado" name="estado" required><br><br>

        <label>Ciudad</label>
        <input type="text" id= "ciudad" name="ciudad" required><br><br>

        <label>Zona</label>
        <input type="text" id= "zona" name="zona" required><br><br>

        <label>Dirección</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label>Correo</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label>Status</label>
        <select id="status" name="status" required>
            <option value="Activo">Activo</option>
            <option value="En construccion">En construcción</option>
            <option value="En mantenimiento">En mantenimiento</option>
            <option value="Cerrado temporalmente">Cerrado temporalmente</option>
            <option value="Cerrado permanentemente">Cerrado temporalmente</option>
        </select><br><br>

        <button>Enviar</button>
    </form>



@endsection