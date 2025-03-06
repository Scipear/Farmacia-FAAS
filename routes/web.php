<?php

// ##################################################
//Rutas hacia los controladores de la base de datos 
// ###############################################

use App\Http\Controllers\CompraController;
use App\Http\Controllers\EmpleadoController;
use app\Http\Controllers\MedicinaController;
use app\Http\Controllers\PedidoController;
use App\Http\Controllers\LaboratorioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\SucursalController;
use Illuminate\Http\Request;

###########################################################


// RUTAS PARA EMPLEADOS
Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados']); // Ruta para obtener todos los empleados
Route::get('/empleado/{id}', [EmpleadoController::class, 'obtenerEmpleadoID']); //Ruta para obtener un empleado por ID
Route::post('/empleado', [EmpleadoController::class, 'crearEmpleado']); // Ruta para crear empleados
Route::put('/empleado/{id}', [EmpleadoController::class, 'actualizarEmpleado']); // Ruta para actualizar un empleado
Route::delete('/empleado/{id}', [EmpleadoController::class, 'eliminarEmpleado']); // Ruta para eliminar un empleado 


// RUTAS PARA MEDICINAS
Route::get('/medicinas', [MedicinaController::class, 'mostrarMedicinas']); // Ruta para obtener todas las medicinas
Route::get('/medicina/{id}', [MedicinaController::class, 'obtenerMedicinaID']); //Ruta para obtener una medicina por ID
Route::post('/medicina', [MedicinaController::class, 'crearMedicina']); // Ruta para crear medicinas
Route::put('/medicina/{id}', [MedicinaController::class, 'actualizarMedicina']); // Ruta para actualizar una medicina
Route::delete('/medicina/{id}', [MedicinaController::class, 'eliminarMedicina']); // Ruta para eliminar una medicina

// RUTAS PARA PEDIDOS
Route::get('/pedidos', [PedidoController::class, 'mostrarPedidos']); // Ruta para obtener todos los pedidos
Route::get('/pedido/{id}', [PedidoController::class, 'obtenerPedidoID']); //Ruta para obtener un pedido por ID
Route::post('/pedido', [PedidoController::class, 'crearPedido']); // Ruta para crear pedidos
Route::put('/pedido/{id}', [PedidoController::class, 'actualizarPedido']); // Ruta para actualizar un pedido

// RUTAS PARA COMPRAS
Route::get('/compras', [CompraController::class, 'mostrarCompras']); // Ruta para obtener todos los pedidos
Route::get('/compra/{id}', [CompraController::class, 'obtenerCompraID']); //Ruta para obtener un pedido por ID
Route::post('/compra', [CompraController::class, 'crearCompra']); // Ruta para crear pedidos
Route::put('/compra/{id}', [CompraController::class, 'actualizarCompra']); // Ruta para actualizar un pedido


//RUTAS PARA LABORATORIOS//

Route::get('/laboratorios', [LaboratorioController::class, 'mostrarLaboratorios']); //Ruta para obtener laboratorios

// RUTAS DE SUCURSALES
Route::get('/sucursales/{id}', [SucursalController::class, 'mostrarSucursal']); // Ruta para obtener una sucursal por id
Route::post('/sucursales', [SucursalController::class, 'guardarSucursal']); // Ruta para guardar sucursales
Route::put('/sucursales/{id}', [SucursalController::class, 'actualizarSucursal']); // Ruta para actualizar una sucursal
Route::delete('/sucursales/{id}', [SucursalController::class, 'eliminarSucursal']); // Ruta para eliminar una sucursal
// RUTAS DE TELEFONOS DE SUCURSALES
Route::get('/sucursales/tefonos/{id}', [SucursalController::class, 'mostrarTelefono']); // Ruta para obtener un telefono de una sucursal por id
Route::post('/sucursales/tefonos', [SucursalController::class, 'guardarTelefono']); // Ruta para guardar telefonos de sucursales
Route::put('/sucursales/tefonos/{id}', [SucursalController::class, 'actualizarTelefono']); // Ruta para actualizar un telefono de una sucursal
Route::delete('/sucursales/tefonos/{id}', [SucursalController::class, 'eliminarTelefono']); // Ruta para eliminar un telefono de una sucursal

// RUTAS DE PRESENTACIONES
Route::get('/presentaciones/{id}', [PresentacionController::class, 'mostrarPresentacion']); // Ruta para obtener una presentacion por id
Route::post('/presentaciones', [PresentacionController::class, 'guardarPresentacion']); // Ruta para guardar presentaciones
Route::put('/presentaciones/{id}', [PresentacionController::class, 'actualizarPresentacion']); // Ruta para actualizar una presentacion
Route::delete('/presentaciones/{id}', [PresentacionController::class, 'eliminarPresentacion']); // Ruta para eliminar una presentacion

// RUTAS DE CARGOS
Route::get('/cargos/{id}', [CargoController::class, 'mostrarCargo']); // Ruta para obtener un cargo por id
Route::post('/cargos', [CargoController::class, 'guardarCargo']); // Ruta para guardar cargos
Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']); // Ruta para actualizar un cargo
Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']); // Ruta para eliminar un cargo

////////////////////////////////////////////////////////
///////////////// RUTAS PARA LAS VISTAS /////////////////
///////////////////////////////////////////////////////


Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function () {
    return view('inicio');
});

//Route::get('/inicio', function () {
//    return view('inicio');
//});

Route::get('/greet', function () {
    return view('master');
});

Route::get('/buscar', function (Request $request) {
    $busqueda = $request->query('query');
    return view('resultados', compact('busqueda'));
})->name('buscar');

//Nueva ruta filtrar
Route::get('/filtrar', function (Request $request) {
    $filtrarM = $request->query('query');
    return view('filtrarCS', compact('filtrarM'));
})->name('filtrar');

///////////////////////////////////////////////////////////////LOGIN///////////////////////////////////////
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login.form');

Route::post('/admin/login', function (\Illuminate\Http\Request $request) {
    $email = $request->input('email');
    $password = $request->input('password');

    // Just for a test xd**
    if ($email == 'admin@example.com' && $password == 'password') {
        session(['admin' => true]); // Set a session variable
        return redirect('/admin/dashboard'); // Redirect to admin dashboard
    } else {
        return back()->with('error', 'Credenciales incorrectas.');
    }
})->name('admin.login');

Route::get('/admin/dashboard', function () {
    if (session('admin')) {
        return view('admin.dashboard'); // Create a basic admin dashboard view
    } else {
        return redirect('/admin/login'); // Redirect to login if not authenticated
    }});

    Route::get('/admin/logout', function () {
        session()->forget('admin'); // Remove the admin session variable
        return redirect('/admin/login');
    });
    ////////////////////////////////////////////////////////REGISTER///////////////////////////////////

Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');


Route::get('/admin/logout', function () {
    session()->forget('admin'); // Remove the admin session variable
    return redirect('/admin/login');
});

//Get:Redirigir hacia pagina
//Mandar info no visible desde un formulario
//Put
//Patch
//Delete
