@extends('master')

@section('titulo', 'Panel de Farmaceutico')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">    
            <a class="nav-link active" href="/farmaceutico/medicina">Volver</a>
            </li>

            <li class="nav-item">
            <a class="nav-link active" href="/farmaceutico/inicioFarmaceutico">Inicio</a>
            </li>

            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Stock de {{$medicina->medicamento->nombre}} 
        ({{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}}) 
        distribuido por {{$medicina->laboratorio->nombre}}</h1>
        <div class="container">
        </div>

        <a class="botonAg" href="/farmaceutico/{{$medicina->id}}/formMedicinaSucursal">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>Sucursal</th>
                    <th>Existencia</th>
                    <th>Observacion</th>
                    <th>Opciones</th>
                </tr>
                @foreach($sucursales as $sucursal)
                    <tr>
                        <td>{{$sucursal->sucursal->nombre}}</td>
                        <td>{{$sucursal->cantidad}}</td>
                        <td>{{$sucursal->observacion}}</td>
                        <td>
                            <div class="buttonCont">
                                <a class="botonEd" href="/farmaceutico/medicina/{{$medicina->id}}/sucursal/{{$sucursal->sucursal_id}}">Editar</a>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach
            </table>
        </center>
@endsection