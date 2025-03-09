@extends('master')

@section('titulo', 'Panel de Administrador')
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
<h1>Formulario para crear un Cargo </h1>
<form method="POST" action="/cargos/{{$cargo->id}}">
    @csrf
    @method('PUT')

    <label>Nombre</label>
    <input type="text" id ="nombre" name="nombre" value="{{$cargo->nombre}}"required><br><br>

    <button>Enviar</button>
</form>



@endsection