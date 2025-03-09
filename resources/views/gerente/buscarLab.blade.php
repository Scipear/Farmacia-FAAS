@extends('master')

@section('titulo', 'Panel de Gerente')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/login">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <h1>Información de los Laboratorios</h1>
        @if($BuscarL)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarL}}</strong></p>
        </div>

        <a  class="botonAg" href="/gerente/formLab">Afiliar +</a>

        <center>
            <table>
                <tr>
                    <th>Nombre del laboratorio</th>
                    <th>Sucursal</th>
                    <th>Opción</th>
                </tr>

                <tr>
                    <td>{{$laboratorio->nombre}}</td>
                    <td>Lomalinfda</td>
                    <td>
                        <div class="buttonCont">
                        <a  class="botonEd" href="/editarLaboratorio/{{$laboratorio->id}}">Editar</a>

                            <button popovertarget="popup{{$laboratorio->id}}">Desafiliar</button>

                            <div popover id="popup{{$laboratorio->id}}">
                                ¿Estás seguro que quieres eliminar este registro?<br><br>
                                <form method="POST" action="/laboratorio/{{$laboratorio->id}}">
                                    @csrf
                                    @method('DELETE')

                                    <button popovertarget="popup{{$laboratorio->id}}">Aceptar</button>
                                </form>
                                <button popovertarget="popup{{$laboratorio->id}}">Desafiliar</button>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </center>
        @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection