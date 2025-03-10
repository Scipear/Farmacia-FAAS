@extends('master')

@section('titulo', 'Panel de Administrador')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/admin/dashboard">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <h1>Información de los Laboratorios</h1>
        <div class="container">
        </div>
        <div>        
            <form action="/buscarLaboratorio" method="GET">
            <input type="text" name="query" placeholder="Buscar laboratorio...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <a  class="botonAg" href="/admin/formLab">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono(s)</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Opción</th>
                </tr>

                @foreach($laboratorios as $laboratorio)
                <tr>
                    <td>{{$laboratorio->nombre}}</td>

                    <td>
                        @foreach($laboratorio->telefonos as $telefono)
                            {{$telefono->numero}}<br>
                        @endforeach
                    </td>

                    <td>{{$laboratorio->ciudad}}</td>
                    <td>{{$laboratorio->direccion}}</td>
                    <td>{{$laboratorio->correo}}</td>
                    <td>
                        <div class="buttonCont">
                        <a  class="botonEd" href="/editarLaboratorio/{{$laboratorio->id}}">Editar</a>

                            <button popovertarget="popup{{$laboratorio->id}}">Eliminar</button>

                            <div popover id="popup{{$laboratorio->id}}">
                                ¿Estás seguro que quieres eliminar este registro?<br><br>
                                <form method="POST" action="/laboratorio/{{$laboratorio->id}}">
                                    @csrf
                                    @method('DELETE')

                                    <button popovertarget="popup{{$laboratorio->id}}">Aceptar</button>
                                </form>
                                <button popovertarget="popup{{$laboratorio->id}}">Cerrar</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </center>
@endsection