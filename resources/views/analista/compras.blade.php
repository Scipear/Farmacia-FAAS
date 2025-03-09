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
<h1>Información de las Compras</h1>
        <div class="container">
        </div>
        <div>        
            <form action="{{ route('buscarC') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar compra...">
            <button type="submit">Buscar</button>
        </form>
        </div>
        <a  class="botonPDF">Descargar PDF</a>

        <center>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>Medicinas</th>
                    <th>Fecha de Llegada</th>
                    <th>Precio A Pagar</th>
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
                                <button>Actualizar</button>
                            </div>
                    </td>
                </tr>
            </table>
        </center>
@endsection
