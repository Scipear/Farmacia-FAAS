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
    <h1>Información de Empleados</h1>

    @if($BuscarEmpS)
        <div class="container">
            <p>Mostrando resultados para: <strong>{{$BuscarEmpS}}</strong></p>
        </div>

        <a  class="botonAg" href="formEmp">Agregar +</a>

        <div class="espacio">
        <a  class="botonRep" href="fichaHist">Generar ficha historica +</a>
        </div>

        
        <center>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Dirección</th>
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
        @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection