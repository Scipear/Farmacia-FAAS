@extends('master')

@section('titulo', 'Panel de Administrador')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/admin/dashboard">inicioadmin</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <div class="container">
            <h1>Información de Tipo de presentación</h1>
            <p>Mostrando resultados para: <strong>{{$BuscarPre}}</strong></p>
        </div>
       <div class="buttonA">
                <button>Agregar +</button>
        </div>
        <table>
                <tr>
                    <th>ID</th>
                    <th>Tipo presentación</th>
                    <th>Cantidad</th>
                    <th>Medida</th>
                    <th>Unidades</th>
                    <th>Opcines</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>Genvem</td>
                    <td>20mg</td>
                    <td>Dolor </td>
                    <td>
                        <div class="buttonCont">
                        <button>Editar</button>
                        <button>Eliminar</button>
                     </div>
                    </td>
                    
                </tr>

            </table>
@endsection