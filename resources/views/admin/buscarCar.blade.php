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
        <h1>Información de los cargos</h1>
        @if($BuscarC)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarC}}</strong></p>
        </div>

        <a  class="botonAg" href="/admin/formCarg">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Cargo</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>
                    <div class="buttonCont">
                        <button>Editar</button>
                        <button>Eliminar</button>
                     </div>
                    </td>
                </tr>
            </table>
        </center>
        @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection