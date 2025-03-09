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

        <div class="container">
            <h1>Bienvenido al Panel de Gerente </h1>
            <p>¡Has iniciado sesión como gerente!</p><br>
        </div>

    <!-- RUTAS PARA COLOCAR EN GERENTE
    
    //INICIO
    Route::get('/gerente/inicioGerente', function () {
        return view('gerente.inicioGerente');
    }); 
    
    //EMPLEADOS
    Route::get('/gerente/empleados', function () {
        return view('gerente.empleados');
    }); 

    //PEDIDOS
    Route::get('/gerente/pedidos', function () {
        return view('gerente.pedidos');
    }); 

    //COMPRAS
    Route::get('/gerente/compras', function () {
        return view('gerente.compras');
    }); 

    //STOCK
        Route::get('/gerente/laboratorios, function () {
        return view('gerente.laboratorios');
    }); 

    //CUENTAS POR PAGAR
    Route::get('/gerente/cuentasxpagar', function () {
        return view('gerente.cuentasxpagar');
    }); 

    
    -->
    
    <a class="botonIr" href="/gerente/empleados">Gestionar empleados</a><br><br>

    <a class="botonIr" href="/gerente/pedidos">Gestionar pedidos</a><br><br>

    <a class="botonIr" href="/gerente/compras">Gestionar compras</a><br><br>

    <a class="botonIr" href="/gerente/laboratorios">Gestionar laboratorios</a><br><br>

    <a class="botonIr" href="/gerente/cuentasxpagar">Ver cuentas por pagar</a><br><br>

@endsection