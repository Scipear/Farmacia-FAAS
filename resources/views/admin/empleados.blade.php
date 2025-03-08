@extends('master')

@section('titulo', 'Panel de Administrador')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/admin/dashboard">inicioadmin</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <h1>Información de los Empleados</h1>
        <div class="container">
        </div>
        <div>        
            <form action="{{ route('buscarE') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar empleado...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <div class="buttonA">
                <button>Agregar +</button>
        </div>
        <table>
                <tr>
                    <th>ID</th>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono(s)</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>Genvem</td>
                    <td>20mg</td>
                    <td>             
                    <div class="buttonCont">
                        <button>Ver</button>
                     </div></td>
                    <td>Dolor </td>
                    <td>10</td>
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
@endsection