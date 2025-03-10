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
    <h1>Información de Compras</h1>


        <div>        
            <form action="{{ route('buscarCompraS') }}" method="GET">
            <input type="text" name="query" placeholder="Consultar compras de una sucursal...">
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
                    <th>Precio A Pagar</th>
                    <th>Forma de Pago</th>
                    <th>Fecha de Llegada</th>
                    <th>Observación</th>
                    <th>Status</th>
                    <th>Opciones</th>
                </tr>
                @foreach($compras as $compra)    
                    <tr>
                        <td>{{$compra->id}}</td>
                        <td>{{$compra->pedido->sucursal->nombre}}</td>
                        <td>{{$compra->pedido->empleado->nombre}} {{$compra->pedido->empleado->apellido}}</td>
                        <td>{{$compra->pedido->laboratorio->nombre}}</td>
                        <td><a  class="botonVer" href="/compra/{{$compra->id}}/medicinas">Ver</a></td>
                        <td>{{$compra->precioPagar}}</td>
                        <td>{{$compra->pedido->tipoPago}}</td>
                        <td>{{$compra->fechaLlegada}}</td>
                        <td>{{$compra->observaciones}}</td>
                        <td>{{$compra->status}}</td>
                        <td>
                                <div class="buttonCont">
                                    <a  class="botonEd" href="/actualizarCompra/{{$compra->id}}">Actualizar</a>
                                </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </center>
@endsection