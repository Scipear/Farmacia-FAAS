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
        <h1>Información de Surcursales</h1>
        <div class="container">
        </div>

        <div> 
            <form action="/buscarSucursal" method="GET">
                <input type="text" name="query" placeholder="Buscar sucursal...">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <a  class="botonAg" href="/admin/formSuc">Agregar +</a>
        
        <table>
                <tr>
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

                @foreach($sucursales as $sucursal)
                    <tr>
                        <td>{{$sucursal->nombre}}</td>
                        
                        <td>
                            <div class="buttonCont">
                                <button>Ver</button>
                            </div>
                        </td>

                        <td>{{$sucursal->estado}}</td>
                        <td>{{$sucursal->ciudad}}</td>
                        <td>{{$sucursal->zona}}</td>
                        <td>{{$sucursal->direccion}}</td>
                        <td>{{$sucursal->correo}}</td>
                        <td>{{$sucursal->status}}</td>
                        
                        <td>
                            <div class="buttonCont">
                            <a  class="botonEd" href="/editarSucursal/{{$sucursal->id}}">Editar</a>
                                
                                <button popovertarget="popup{{$sucursal->id}}">Eliminar</button>
                                <div>
                                <div popover id="popup{{$sucursal->id}}">
                                    ¿Estás seguro que quieres eliminar este registro?<br><br>
                                    
                                    <form action="/sucursales/{{$sucursal->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">Aceptar</button>
                                    </form>
    
                                    <button popovertarget="popup{{$sucursal->id}}">Cerrar</button>
                                </div>
                                </div>
                                
                            </div>
                        </td>

                    </tr>
                @endforeach

            </table>
@endsection