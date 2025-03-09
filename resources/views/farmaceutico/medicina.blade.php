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
        <h1>Información de las Medicinas</h1>
        <div class="container">
        </div>
        <div>        
            <form action="/buscarMedicina" method="GET">
            <input type="text" name="query" placeholder="Buscar medicina...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <a  class="botonAg" href="/farmaceutico/formMedicina">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>Medicamento</th>
                    <th>Laboratorio</th>
                    <th>Presentación</th>
                    <th>Descripción</th>
                    <th>Precio Compra</th>
                    <th>Precio Venta</th>
                    <th>Opciones</th>
                </tr>
                @foreach($medicinas as $medicina)
                    <tr>
                        <td>{{$medicina->medicamento->nombre}}</td>
                        <td>{{$medicina->laboratorio->nombre}}</td>
                        <td>{{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}}</td>
                        <td>{{$medicina->descripcion}}</td>
                        <td>${{$medicina->precio_compra}}</td>
                        <td>${{$medicina->precio_venta}}</td>
                        <td>
                            <div class="buttonCont">
                                <a class="botonEd" href="/medicina/{{$medicina->id}}">Editar</a>
                                <a class ="botonEd" href="/farmaceutico/medicina/{{$medicina->id}}/sucursales">Existencia en sucursales</a>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach

            </table>
        </center>
@endsection