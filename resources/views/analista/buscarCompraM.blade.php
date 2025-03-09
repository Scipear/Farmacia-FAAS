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
        <h1>Información de las Compra de Medicina</h1>
        @if($BuscarCM)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarCM}}</strong></p>
        </div>

        <a  class="botonAg" href="analista/formCompraMedicina">Agregar +</a>
        <center>
        <table>
                <tr>
                    <th>Nombre</th>
                    <th>Laboratorio</th>
                    <th>Tipo de Presentación</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
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
        <center>
        @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection