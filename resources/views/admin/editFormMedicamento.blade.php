@extends('master')

@section('titulo', 'Panel de Administrador')
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
    <h1>Formulario de Medicamento</h1>
    <form>

        @csrf

        <label>Nombre principal</label>
        <input type="text" id ="nombrePrin" name="nombrePrin" required><br><br>

        <button>Enviar</button>
    </form>
@endsection