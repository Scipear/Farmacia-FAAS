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
        <h1>Información de los Tipos de Presentaciones</h1>
        <div class="container">
        </div>
        <div>        
            <form action="/buscarPre" method="GET">
            <input type="text" name="query" placeholder="Buscar tipo presentación...">
            <button type="submit">Buscar</button>
        </form>
        </div>

            <a class="botonAg" href="/farmaceutico/formPre">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>Tipo de Presentación</th>
                    <th>Cantidad</th>
                    <th>Unidades</th>
                    <th>Opciones</th>
                </tr>
                @foreach($presentaciones as $presentacion)
                    <tr>
                        <td>{{$presentacion->tipo}}</td>
                        <td>{{$presentacion->cantidad}} {{$presentacion->medida}}</td>
                        <td>{{$presentacion->unidades}}</td>
                        <td>
                            <div class="buttonCont">
                                <a class="botonEd" href="/editarPresentacion/{{$presentacion->id}}">Editar</a>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach

            </table>
        </center>
@endsection