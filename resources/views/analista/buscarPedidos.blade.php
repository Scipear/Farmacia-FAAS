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
<h1>Información de los Pedidos</h1>
        @if($BuscarP)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarP}}</strong></p>
        </div>

        <a  class="botonAg" href="analista/formPedido">Crear pedido +</a><br>

        <div class="espacio">
        <a  class="botonPDF">Descargar PDF</a>
        </div>

        <center>
        <table>
                <tr>
                    <th>Sucursal</th>
                    <th>Empleado</th>
                    <th>Laboratorio</th>
                    <th>Fecha de emisión</th>
                    <th>Precio total</th>
                    <th>Forma de pago</th>
                    <th>Status</th>
                    <th>Observación</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <td>Genvem</td>
                    <td>10</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>
                            <div class="buttonCont">
                                <button>Actualizar</button>
                            </div>
                    </td>
                </tr>
            </table>
        </center>
        @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection
