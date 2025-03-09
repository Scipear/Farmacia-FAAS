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
    <h1>Actualizando Medicina {{$medicina->medicamento->nombre}} 
        ({{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}}) 
        distribuido por {{$medicina->laboratorio->nombre}}</h1>

    <form method="POST" action="/medicina/{{$medicina->id}}">
        @csrf
        @method('PUT')
        
        <label>Laboratorio: </label><br>
        <select name="laboratorio_id">
            @foreach($laboratorios as $laboratorio)
                <option value="{{$laboratorio->id}}" {{$laboratorio->id == $medicina->laboratorio_id ? 'selected' : ''}}>
                    {{$laboratorio->nombre}}</option>
            @endforeach
        </select><br><br>

        <label>Medicamento: </label><br>
        <select name="medicamento_id">
            @foreach($medicamentos as $medicamento)
                <option value="{{$medicamento->id}}" {{$medicamento->id == $medicina->medicamento_id ? 'selected' : ''}}>
                    {{$medicamento->nombre}}</option>
            @endforeach
        </select><br><br>

        <label>Presentación: </label><br>
        <select name="presentacion_id">
            @foreach($presentaciones as $presentacion)
                <option value="{{$presentacion->id}}" {{$presentacion->id == $medicina->presentacion_id ? 'selected' : ''}}>
                    {{$presentacion->unidades}} {{$presentacion->tipo}} {{$presentacion->cantidad}} {{$presentacion->medida}}</option>
            @endforeach
        </select><br><br>
        
        <label>Descripción</label>
        <input type="text" id ="descripcion" name="descripcion" value={{$medicina->descripcion}} required><br><br>

        <label>Precio de Compra</label>
        <input type="text" id= "precio_compra" name="precio_compra" value={{$medicina->precio_compra}} required><br><br>

        <label>Precio de Venta</label>
        <input type="text" id= "precio_venta" name="precio_venta" value={{$medicina->precio_venta}} required><br><br>

        <button>Enviar</button>
    </form>
@endsection