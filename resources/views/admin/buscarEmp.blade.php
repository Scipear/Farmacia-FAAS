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
        <div class="container">
            <h1>Información de los Empleados</h1>
            <p>Mostrando resultados para: <strong>{{$BuscarE}}</strong></p>
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
                        <button>Eliminar</button>
                     </div>
                    </td>
                    
                </tr>

            </table>
@endsection