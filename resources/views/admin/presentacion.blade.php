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
        <h1>Información de Tipo de presentación</h1>
        <div class="container">
        </div>
        <div>        
            <form action="{{ route('buscarPresentacion') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar tipo presentación...">
            <button type="submit">Buscar</button>
        </form>
        </div>

            <a  class="botonAg" href="/admin/formPre">Agregar +</a>

        <table>
                <tr>
                    <th>Tipo presentación</th>
                    <th>Cantidad</th>
                    <th>Medida</th>
                    <th>Unidades</th>
                    <th>Opcines</th>
                </tr>
                <tr>
                    <td>Acetf</td>
                    <td>Genvem</td>
                    <td>20mg</td>
                    <td>Dolor </td>
                    <td>
                        <div class="buttonCont">
                        <button>Editar</button>
                        <button popovertarget="popup">Eliminar</button>
                        <div popover id="popup">
                        ¿Estás seguro que quieres eliminar este registro?<br><br>
                        <button popovertarget="popup">Aceptar</button>
                        <button popovertarget="popup">Cerrar</button>
                        </div>
                     </div>
                    </td>
                    
                </tr>

            </table>
@endsection