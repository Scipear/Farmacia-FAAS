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
    <h1>Formulario para crear una Medicina</h1>
        <form method="POST" action="/medicina">
            @csrf
            
            <label>Laboratorio: </label><br>
            <select name="laboratorio_id">
                @foreach($laboratorios as $laboratorio)
                    <option value="{{$laboratorio->id}}">{{$laboratorio->nombre}}</option>
                @endforeach
            </select><br><br>

            <label>Medicamento: </label><br>
            <select name="medicamento_id">
                @foreach($medicamentos as $medicamento)
                    <option value="{{$medicamento->id}}">{{$medicamento->nombre}}</option>
                @endforeach
            </select><br><br>

            <label>Presentación: </label><br>
            <select name="presentacion_id">
                @foreach($presentaciones as $presentacion)
                    <option value="{{$presentacion->id}}">{{$presentacion->unidades}} {{$presentacion->tipo}} {{$presentacion->cantidad}} {{$presentacion->medida}}</option>
                @endforeach
            </select><br><br>
            
            <label>Descripción</label>
            <input type="text" id ="descripcion" name="descripcion" required><br><br>

            <label>Precio de Compra</label>
            <input type="text" id= "precio_compra" name="precio_compra" required><br><br>

            <label>Precio de Venta</label>
            <input type="text" id= "precio_venta" name="precio_venta" required><br><br>

            <button>Enviar</button>
        </form>
@endsection