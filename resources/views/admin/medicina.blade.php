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
        <h1>Información de Medicina</h1>
        <div class="container">
        </div>
        <div>        
            <form action="{{ route('buscarMedicina') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar medicina...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <div class="buttonA">
        <a  class="botonAg" href="/admin/formMedicina">Agregar +</a>
        </div>
        <table>
                <tr>
                    <th>laboratorioID</th>
                    <th>MedicamentoID</th>
                    <th>PresentaciónID</th>
                    <th>Descripción</th>
                    <th>Precio compra</th>
                    <th>Precio venta</th>
                    <th>Opcines</th>
                </tr>
                <tr>
                    <td>Acetf</td>
                    <td>Genvem</td>
                    <td>20mg</td>
                    <td>Dolor </td>
                    <td>10</td>
                    <td>15</td>
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