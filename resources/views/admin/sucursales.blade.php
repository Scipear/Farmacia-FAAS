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
            <h1>Información de Surcursales</h1>
        </div>
        <div>        
        <!-- Hacer una ruta llamada buscar sucursal Y ACA CAMBIART-->
                <form action="{{ route('filtrar') }}" method="GET">
            <input type="text" name="query" placeholder="Filtrar...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <div class="buttonA">
                <button>Agregar +</button>
        </div>
        <table>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Estado</th>
                    <th>Ciudad</th>
                    <th>Zona</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Status</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>Genvem</td>
                    <td>20mg</td>
                    <td>Dolor </td>
                    <td>10</td>
                    <td>20</td>
                    <td>20</td>
                    <td>
                    <div class="buttonCont">
                        <button>Editar</button>
                        <button>Eliminar</button>
                     </div>
                    </td>
                    
                </tr>

            </table>
            <h1>Otros datos</h1>
            <b>Teléfonos </b>
            <a  class="botonIr" href="/admin/telfsucursal">Ir</a><br><br><br>
            <b>Laboratorios afiliados </b>
            <a  class="botonIr" href="/admin/laboratoriosA">Ir</a><br><br>

@endsection