@extends('master')

@section('titulo', 'Panel de Farmaceutico')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/farmaceutico/inicioFarmaceutico">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Formulario para crear un Tipo de Presentación</h1>
        <form method="POST" action="/presentaciones">

            @csrf

            <label>Tipo Presentación</label>
            <input type="text" id ="tipo" name="tipo" required><br><br>

            <label>Cantidad</label>
            <input type="text" id= "cantidad" name="cantidad" required><br><br>

            <label>Medida</label>
            <input type="text" id= "medida" name="medida" required><br><br>

            <label>Unidades</label>
            <input type="text" id= "unidades" name="unidades" required><br><br>

            <button>Enviar</button>
        </form>



@endsection