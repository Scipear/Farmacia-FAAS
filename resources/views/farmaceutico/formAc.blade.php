@extends('master')

@section('titulo', 'Panel de Farmaceutico')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/farmaceutico/inicioFarmaceutico">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Formulario para crear una Acción Terapeutica</h1>
        <form method="POST" action="/accion/terapeutica">

            @csrf

            <label>Nombre</label>
            <input type="text" id ="nombre" name="nombre" required><br><br>
            <button>Enviar</button>
        </form>

@endsection