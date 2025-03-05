@extends('master')

@section('titulo', 'Resultados de Búsqueda')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.login.form') }}">Login</a>
        </li>  
</ul>
</header>

@section('contenido')
    <h1>Resultados de Búsqueda</h1>
    
    @if($busqueda)
        <p>Mostrando resultados para: <strong>{{$busqueda}}</strong></p>

        <div class="content">
        <p>Filtrar por Ciudad o Sucursal </p>
        <form action="{{ route('filtrar') }}" method="GET">
            <input type="text" name="query" placeholder="Filtrar...">
            <button type="submit">Buscar</button>
        </form>
        </div>


        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Laboratorio:</th>
                <th>Presentación</th>
                <th>Descripción</th>
                <th>Precio</th>
            </tr>
            <tr>
                <td>123</td>
                <td>Acetaminofen</td>
                <td>Genvem</td>
                <td>20mg</td>
                <td>Dolor </td>

                <td>20</td>
        </table>
   @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection
