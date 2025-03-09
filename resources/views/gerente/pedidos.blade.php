@extends('master')

@section('titulo', 'Panel de Gerente')

@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/inicioGerente">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>  
</ul>
</header>

@section('contenido')
    <h1>Información de Pedidos</h1>

    <!-- RUTA DE BUSQUEDA 
    Route::get('/buscarPedS', function (Request $request) {
        $BuscarPedS= $request->query('query');
        return view('gerente.buscarPedS', compact('BuscarPedS'));
    })->name('buscarPedS');
    -->
        <div>        
            <form action="{{ route('buscarComS') }}" method="GET">
            <input type="text" name="query" placeholder="Consultar pedidos de una sucursal...">
            <button type="submit">Buscar</button>
        </form>
        </div>
        <a  class="botonPDF">Descargar PDF</a>
        <center>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>SucursalID</th>
                    <th>EmpleadoID</th>
                    <th>LaboratorioID</th>
                    <th>Fecha de emisión</th>
                    <th>Precio total</th>
                    <th>Forma de pago</th>
                    <th>Observación</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                </tr>
            </table>
        </center>
@endsection