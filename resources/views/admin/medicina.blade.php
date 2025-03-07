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
            <h1>Información de Medicina</h1>
        </div>
        <div>        
        <!-- Hacer una ruta llamada buscar sucursal Y ACA CAMBIART-->
                <form action="{{ route('buscarMedicina') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar medicina...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <div class="buttonA">
                <button>Agregar +</button>
        </div>
        <table>
                <tr>
                    <th>ID</th>
                    <th>laboratorioID</th>
                    <th>MedicamentoID</th>
                    <th>PresentaciónID</th>
                    <th>Descripción</th>
                    <th>Precio compra</th>
                    <th>Precio venta</th>
                    <th>Opcines</th>
                </tr>
                <tr>
                    <td>123</td>
                    <td>Acetf</td>
                    <td>Genvem</td>
                    <td>20mg</td>
                    <td>Dolor </td>
                    <td>10</td>
                    <td>15</td>
                    <td>
                        <div class="buttonCont">
                        <button>Editar</button>
                        <button>Eliminar</button>
                     </div>
                    </td>
                    
                </tr>

            </table>
@endsection