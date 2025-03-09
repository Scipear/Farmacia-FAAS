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
    <h1>Información de Cuentas por pagar</h1>

    <!-- RUTA DE BUSQUEDA 
    Route::get('/buscarCP', function (Request $request) {
        $BuscarCP= $request->query('query');
        return view('gerente.buscarCuentaxPagar', compact('BuscarCP'));
    })->name('buscarCP');
    -->
        <div>        
            <form action="{{ route('buscarCP') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar cuenta por pagar...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <center>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>Fecha de Llegada</th>
                    <th>Precio a Pagar</th>
                    <th>Observación</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                    <td>Genvem</td>
                </tr>
            </table>
        </center>
@endsection