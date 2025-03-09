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
        <h1>Información de los Empleados</h1>
        <div class="container">
        </div>
        <div>        
            <form action="/buscarEmpleado" method="GET">
            <input type="text" name="query" placeholder="Buscar empleado...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <a  class="botonAg" href="formEmp">Agregar +</a>
        <table>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Teléfono(s)</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th>Status</th>
                    <th>Cargo</th>
                    <th>Sucursal</th>
                    <th>Opciones</th>
                </tr>

                @foreach($empleados as $empleado)
                    <tr>
                        <td>{{$empleado->cedula}}</td>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->apellido}}</td>
                        <td>             
                            <div class="buttonCont">
                                <button>Ver</button>
                            </div></td>
                        <td>{{$empleado->correo}}</td>
                        <td>{{$empleado->direccion}}</td>
                        <td>{{$empleado->status}}</td>
                        <td>{{$empleado->cargoActual}}</td>
                        <td>{{$empleado->sucursalActual}}</td>
                        <td>
                        <div class="buttonCont">
                            <button>Editar</button>
                            <button popovertarget="popup{{$empleado->id}}">Eliminar</button>
                            <div popover id="popup{{$empleado->id}}">
                                ¿Estás seguro que quieres eliminar este registro?<br><br>
                                <form method='POST' action='/empleado/{{$empleado->id}}'>
                                    @csrf
                                    @method('DELETE')

                                    <button popovertarget="popup{{$empleado->id}}">Aceptar</button>
                                </form>
                                <button popovertarget="popup{{$empleado->id}}">Cerrar</button>
                            </div>
                        </div>
                        </td>
                        
                    </tr>
                @endforeach
            </table>
@endsection