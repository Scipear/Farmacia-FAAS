@extends('master')

@section('titulo', 'Panel de Administrador')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <h1>Información de los cargos</h1>
        <div class="container">
        </div>
        <div>        
            <form action="/buscarCargo" method="GET">
            <input type="text" name="query" placeholder="Buscar cargo...">
            <button type="submit">Buscar</button>
        </form>
        </div>


        <a  class="botonAg" href="/admin/formCarg">Agregar +</a>

            <table>
                <tr>
                    <th>Cargo</th>
                    <th>Opciones</th>
                </tr>
                @foreach($cargos as $cargo)
                    <tr>
                        <td>{{$cargo->nombre}}</td>
                        <td>
                            <div class="buttonCont">
                                <button>Editar</button>
                                <button>Eliminar</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
@endsection