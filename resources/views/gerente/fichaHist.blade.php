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
    <h1>Ficha historica de empleados</h1>

    <p>FICHA HISTORICA EMPLEADO CARGO</p>
        
        <center>
            <table>
                <tr>
                    <th>CargoID</th>
                    <th>EmpleadoID</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                </tr>
                <tr>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                </tr>
            </table>
        </center>

        <p>FICHA HISTORICA EMPLEADO SUCURSAL</p>

        <center>
            <table>
            <tr>
                    <th>SucursalID</th>
                    <th>EmpleadoID</th>
                    <th>Fecha inicio</th>
                    <th>Fecha fin</th>
                </tr>
                <tr>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                </tr>
            </table>
        </center>


@endsection