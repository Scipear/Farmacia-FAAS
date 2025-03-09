@extends('master')

@section('titulo', 'Panel de Gerente')

<header>
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

    <h1>Bienvenido Gerente</h1>
    <p>Selecciona una opcion para gestionar</p><br>

    <!-- RUTAS PARA COLOCAR EN GERENTE
    
    //INICIO
    Route::get('/gerente/inicioGerente', function () {
        return view('gerente.inicioGerente');
    }); 
    
    //EMPLEADOS
    Route::get('/gerente/empleados', function () {
        return view('gerente.empleados');
    }); 

    //STOCK
        Route::get('/gerente/stock', function () {
        return view('gerente.stock');
    }); 

    //PEDIDOS
    Route::get('/gerente/pedidos', function () {
        return view('gerente.pedidos');
    }); 

    //COMPRAS
    Route::get('/gerente/compras', function () {
        return view('gerente.compras');
    }); 

    //CUENTAS POR PAGAR
    Route::get('/gerente/cuentasxpagar', function () {
        return view('gerente.cuentasxpagar');
    }); 

    
    -->
    
    <a class="botonIr" href="/gerente/empleados">Gestionar empleados</a><br><br>

    <a class="botonIr" href="/gerente/stock">Gestionar stock (Medicinas)</a><br><br>

    <a class="botonIr" href="/gerente/pedidos">Gestionar pedidos</a><br><br>

    <a class="botonIr" href="/gerente/compras">Gestionar compras</a><br><br>

    <a class="botonIr" href="/gerente/cuentasxpagar">Ver cuentas por pagar</a><br><br>

@endsection