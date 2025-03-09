@extends('master')

@section('titulo', 'Panel de Gerente')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/login">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Formulario para afiliar un Laboratorio</h1>
    <form>

        <label>Nombre del laboratorio</label>
        <input type="text" id ="nombre" name="nombre" required><br><br>

        <label>Sucursal</label>
        <input type="text" id= "sucursal" name="sucursal" required><br><br>

        <button>Enviar</button>
    </form>
@endsection