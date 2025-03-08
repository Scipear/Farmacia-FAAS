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
        <h1>Información de los cargos</h1>
        <div class="container">
        </div>
        <div>        
            <form action="{{ route('buscarC') }}" method="GET">
            <input type="text" name="query" placeholder="Buecar cargo...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <div class="buttonA">
                <button>Agregar +</button>
        </div>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Cargo</th>
                    <th>Opciones</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>
                    <div class="buttonCont">
                        <button>Editar</button>
                        <button>Eliminar</button>
                     </div>
                    </td>
                </tr>
            </table>
@endsection