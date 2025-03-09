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
        <div>        
            <form action="{{ route('buscarCP') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar cuenta por pagar...">
            <button type="submit">Buscar</button>
        </form>
        </div>

            <!-- <a  class="botonAg" href="/admin/formMedicamento">Agregar +</a> -->
        <center>
            <table>
                <tr>
                    <th>Identificador</th>
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
                </tr>
            </table>
        </center>
@endsection
