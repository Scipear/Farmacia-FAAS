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
        <div>        
            <form action="{{ route('buscarP') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar pedido...">
            <button type="submit">Buscar</button>
        </form>
        </div>
        
        <center>
            <table>
                <tr>

                <!-- CAMBIAR VALORES DE LA TABLA  -->
                    <th>Identificador</th>
                    <th>Medicinas</th>
                    <th>Fecha de Llegada</th>
                    <th>Precio a pagar</th>
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
        </center>
@endsection
