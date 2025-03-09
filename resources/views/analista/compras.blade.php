@extends('master')

@section('titulo', 'Analista de compras')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/analista/inicioAnalista">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>

@section('contenido')
<h1>Información de Compras</h1>
        <div class="container">
        </div>
        <div>        
            <form action="{{ route('buscarC') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar compra...">
            <button type="submit">Buscar</button>
        </form>
        </div>
        <a  class="botonPDF">Descargar PDF</a>
            <table>
                <tr>
                    <th>PedidoID</th>
                    <th>Medicinas</th>
                    <th>Fecha llegada</th>
                    <th>Precio pagar</th>
                    <th>Observación</th>
                    <th>Status</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <td>Genvem</td>
                    <td><a  class="botonVer" href="compraMedicina">Ver</a></td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>
                            <div class="buttonCont">
                                <button>Editar</button>
                            </div>
                    </td>
                </tr>
            </table>
@endsection
