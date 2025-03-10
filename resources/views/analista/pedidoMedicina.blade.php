@extends('master')

@section('titulo', 'Analista de compras')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">    
                <a class="nav-link active" href="/analista/pedidos">Volver</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/analista/inicioAnalista">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>

@section('contenido')
<h1>Lista de Medicinas</h1>
        <div class="container">
        </div>
        <div>        
 
        </div>

        <center>
            <table>
                <tr>
                    <th>Medicamento</th>
                    <th>Laboratorio</th>
                    <th>Presentación</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                </tr>
                @foreach($medicinas as $medicina)
                    <tr>
                        <td>{{$medicina->medicamento->nombre}}</td>
                        <td>{{$medicina->laboratorio->nombre}}</td>
                        <td>{{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}}</td>
                        <td>{{$medicina->descripcion}}</td>
                        <td>{{$medicina->cantidad}}</td>
                        <td>${{$medicina->precio}}</td>
                        
                        
                    </tr>
                @endforeach

            </table>
        </center>
@endsection
