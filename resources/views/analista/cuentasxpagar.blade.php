@extends('master')

@section('titulo', 'Analista de compras')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/analista/inicioAnalista">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>

@section('contenido')
<h1>Información de las Cuentas por Pagar</h1>
        <div class="container">
        </div>
            <center>
                <table>
                    <tr>
                        <th>Identificador</th>
                        <th>Sucursal</th>
                        <th>Empleado</th>
                        <th>Laboratorio</th>
                        <th>Precio A Pagar</th>
                        <th>Fecha de Llegada</th>
                        <th>Observación</th>
                        <th>Status</th>
                        <th>Opciones</th>
                    </tr>
                    @foreach($cuentas as $cuenta)    
                        <tr>
                            <td>{{$cuenta->id}}</td>
                            <td>{{$cuenta->pedido->sucursal->nombre}}</td>
                            <td>{{$cuenta->pedido->empleado->nombre}} {{$cuenta->pedido->empleado->apellido}}</td>
                            <td>{{$cuenta->pedido->laboratorio->nombre}}</td>
                            <td>{{$cuenta->precioPagar}}</td>
                            <td>{{$cuenta->fechaLlegada}}</td>
                            <td>{{$cuenta->pedido->tipoPago}}</td>
                            <td>{{$cuenta->observaciones}}</td>
                            <td>{{$cuenta->status}}</td>
                        </tr>
                    @endforeach
                </table>
            </center>
@endsection
