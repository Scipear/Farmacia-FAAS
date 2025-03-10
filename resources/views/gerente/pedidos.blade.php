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
    <h1>Información de Pedidos</h1>

        <div>        
            <form action="/buscarPedS" method="GET">
            <input type="text" name="query" placeholder="Consultar pedidos de una sucursal...">
            <button type="submit">Buscar</button>
        </form>
        </div>
        <a  class="botonPDF">Descargar PDF</a>
        <center>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>Sucursal</th>
                    <th>Empleado</th>
                    <th>Laboratorio</th>
                    <th>Medicinas</th>
                    <th>Fecha de Emisión</th>
                    <th>Precio A Pagar</th>
                    <th>Forma de Pago</th>
                    <th>Observación</th>
                    <th>Status</th>
                    <th>Opciones</th>
                </tr>
                @foreach ($pedidos as $pedido)    
                    <tr>
                        <td>{{$pedido->id}}</td>
                        <td>{{$pedido->sucursal->nombre}}</td>
                        <td>{{$pedido->empleado->nombre}} {{$pedido->empleado->apellido}}</td>
                        <td>{{$pedido->laboratorio->nombre}}</td>
                        <td><a  class="botonVer" href="/pedido/{{$pedido->id}}/medicinas">Ver</a></td>
                        <td>{{$pedido->fecha_emitida}}</td>
                        <td>{{$pedido->precioTotal}}</td>
                        <td>{{$pedido->tipoPago}}</td>
                        <td>{{$pedido->observaciones}}</td>
                        <td>{{$pedido->status}}</td>
                        <td>
                                <div class="buttonCont">
                                    <a  class="botonEd" href="/actualizarPedido/{{$pedido->id}}">Actualizar</a>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </center>
@endsection