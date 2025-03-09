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
<h1>Información de las Cuentas por pagar</h1>
        @if($BuscarCP)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarCP}}</strong></p>
        </div>
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
        @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection
