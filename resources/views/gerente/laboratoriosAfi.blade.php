@extends('master')

@section('titulo', 'Panel de Gerente')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/login">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <h1>Información de los Laboratorios Afiliados</h1>

        <center>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono(s)</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                </tr>

                <tr>
                    <td>gfdfgf</td>
                    <td>Lomalinfda</td>
                    <td>gfdfgf</td>
                    <td>Lomalinfda</td>
                    <td>Lomalinfda</td>
                </tr>
            </table>
        </center>
@endsection