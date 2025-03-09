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
        <h1>Información de Monodroga</h1>
        @if($BuscarMonodroga)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarMonodroga}}</strong></p>
        </div>

        <a  class="botonAg" href="/admin/formMon">Agregar +</a>

        <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Opcines</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>
                        <div class="buttonCont">
                        <button>Editar</button>
                        <button popovertarget="popup">Eliminar</button>
                        <div popover id="popup">
                        ¿Estás seguro que quieres eliminar este registro?<br><br>
                        <button popovertarget="popup">Aceptar</button>
                        <button popovertarget="popup">Cerrar</button>
                        </div>
                     </div>
                    </td>    
                </tr>
            </table>
        @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection