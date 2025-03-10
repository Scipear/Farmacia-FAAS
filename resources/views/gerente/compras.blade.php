@extends('master')

@section('titulo', 'Panel de Gerente')

<header>

@yield('header', 'Farmacias FAAS')

<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
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
                    <th>PedidoID</th>
                    <th>Fecha de Llegada</th>
                    <th>Precio a Pagar</th>
                    <th>Observación</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                </tr>
            </table>
        </center>
@endsection