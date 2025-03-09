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
    <h1>Formulario para crear stock de {{$medicina->medicamento->nombre}} ({{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}}) 
        distribuido por {{$medicina->laboratorio->nombre}} en la sucursal {{$sucursal->nomrbe}}</h1>
        <form method="POST" action="/medicina/{{$medicina->id}}/sucursal">
            @csrf
            
            <label>Sucursal: </label><br>
            <select name="sucursal_id">
                @foreach($sucursales as $sucursal)
                    <option value="{{$sucursal->id}}">{{$sucursal->nombre}}</option>
                @endforeach
            </select><br><br>
            
            <label>Cantidad</label>
            <input type="text" id ="cantidad" name="cantidad" required><br><br>

            <label>Observacion</label>
            <input type="text" id= "observacion" name="observacion"><br><br>

            <button>Enviar</button>
        </form>
@endsection