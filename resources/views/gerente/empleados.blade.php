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
    <h1>Información de Empleados</h1>

    <!-- RUTA DE BUSQUEDA 
    Route::get('/buscarEmpS', function (Request $request) {
        $BuscarEmpS= $request->query('query');
        return view('gerente.buscarEmpS', compact('BuscarEmpS'));
    })->name('buscarEmpS');
    -->
        <div>        
            <form action="{{ route('buscarEmpS') }}" method="GET">
            <input type="text" name="query" placeholder="Consultar empleados de una sucursal...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <!-- RUTA PARA CREAR EMPLEADO
        Route::get('gerente/formEmp', function () {
            return view('gerente.formEmp');
        });
        
        -->

        <a  class="botonAg" href="formEmp">Agregar +</a>

        <!-- RUTA PARA CREAR FICHA HISTORICA
        Route::get('gerente/fichaHist', function () {
            return view('gerente.fichaHist');
        });
        
        -->

        <a  class="botonRep" href="fichaHist">Generar ficha historica+</a>

        <center>
            <table>
                <tr>
                    <th>Identificador</th>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Apellido</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                </tr>
                <tr>
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