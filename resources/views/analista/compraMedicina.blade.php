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
<h1>Lista de Medicinas</h1>
        <div class="container">
        </div>
        <div>        
            <form action="{{ route('buscarCompraM') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar medicina...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <a  class="botonAg" href="formCompraMedicina">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Laboratorio</th>
                    <th>Tipo de presentación</th>
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
        </center>
@endsection
