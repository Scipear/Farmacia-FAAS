@extends('master')

@section('titulo', 'Panel de Gerente')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Cerrar Sesión</a>
        </li>  
</ul>
</header>

@section('contenido')
    <h1>Información de Empleados</h1>

        <a  class="botonAg" href="formEmp">Agregar +</a>

        <center>
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

                @foreach($empleadosSucursal as $empleado)
                    <tr>
                        <td>{{$empleado->cedula}}</td>
                        <td>{{$empleado->nombre}}</td>
                        <td>{{$empleado->apellido}}</td>
                        <td>             
                            @foreach($empleado->telefonos as $telefono)
                                {{$telefono->numero}}<br>
                            @endforeach
                        </td>
                        <td>{{$empleado->correo}}</td>
                        <td>{{$empleado->direccion}}</td>
                        <td>{{$empleado->status}}</td>
                        <td>{{$empleado->cargoActual}}</td>
                        <td>{{$empleado->sucursalActual}}</td>
                        <td>
                        <div class="buttonCont">
                            <a  class="botonEd" href="/editarEmpleado/{{$empleado->id}}">Editar</a>
                            
                            <a  class="botonEd" href="/gerente/fichaHist/{{$empleado->id}}">Ver ficha historica</a>
                        </div>
                        </td>
                        
                    </tr>
                @endforeach
            </table>
        </center>
@endsection