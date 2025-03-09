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
    <h1>Actualizando Presentación de {{$presentacion->unidades}} {{$presentacion->tipo}} {{$presentacion->cantidad}} {{$presentacion->medida}}</h1>
        <form method="POST" action="/presentaciones/{{$presentacion->id}}">

            @csrf
            @method('PUT')

            <label>Tipo presentación</label>
            <input type="text" id ="tipo" name="tipo" value={{$presentacion->tipo}} required><br><br>

            <label>Cantidad</label>
            <input type="text" id= "cantidad" name="cantidad" value={{$presentacion->cantidad}} required><br><br>

            <label>Medida</label>
            <input type="text" id= "medida" name="medida" value={{$presentacion->medida}} required><br><br>

            <label>Unidades</label>
            <input type="text" id= "unidades" name="unidades" value={{$presentacion->unidades}} required><br><br>
            <button>Enviar</button>
        </form>



@endsection