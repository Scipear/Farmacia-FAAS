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
    <h1>Información de Surcursales</h1>
    @if($BuscarS)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarS}}</strong></p>
        </div>
        <a  class="botonAg" href="/admin/formSuc">Agregar +</a>
        <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono(s)</th>
                    <th>Estado</th>
                    <th>Ciudad</th>
                    <th>Zona</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Status</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>
                    <div class="buttonCont">
                        <button>Ver</button>
                     </div>
                    </td>
                    <td>Genvem</td>
                    <td>20mg</td>
                    <td>Dolor </td>
                    <td>10</td>
                    <td>20</td>
                    <td>20</td>
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