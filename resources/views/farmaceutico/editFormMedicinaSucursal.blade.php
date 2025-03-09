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
    <h1>Actualizando stock de {{$medicina->medicamento->nombre}} 
        ({{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}}) 
        distribuido por {{$medicina->laboratorio->nombre}} en la sucursal {{$medicinaSucursal->sucursal->nombre}}</h1>

    <form method="POST" action="/medicina/{{$medicinaSucursal->medicina_id}}/sucursal/{{$medicinaSucursal->sucursal_id}}">
        @csrf
        @method('PUT')
        
        <label>Cantidad</label>
        <input type="text" id ="cantidad" name="cantidad" value={{$medicinaSucursal->cantidad}} required><br><br>

        <label>Observacion</label>
        <input type="text" id= "observacion" name="observacion" value={{$medicinaSucursal->observacion}}><br><br>

        <button>Enviar</button>
    </form>
@endsection