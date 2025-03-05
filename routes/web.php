<?php

// ##################################################
//Rutas hacia los controladores de la base de datos 
// ###############################################

use App\Http\Controllers\EmpleadoController;
use app\Http\Controllers\MedicinaController;
use app\Http\Controllers\PedidoController;

use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\TelefonoLaboratorioController;
use App\Http\Controllers\AccionTerapeuticaController;
use App\Http\Controllers\MedicamentoController;
use App\Http\Controllers\MonodrogaController;

use Illuminate\Support\Facades\Route;
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
Route::get('/pedido/{id}', [MedicinaController::class, 'obtenerPedidoID']); //Ruta para obtener un pedido por ID
Route::post('/pedido', [MedicinaController::class, 'crearPedido']); // Ruta para crear pedidos
Route::put('/pedido/{id}', [MedicinaController::class, 'actualizarPedido']); // Ruta para actualizar un pedido


// RUTAS PARA COMPRAS
Route::get('/compras', [PedidoController::class, 'mostrarCompras']); // Ruta para obtener todos los pedidos
Route::get('/compra/{id}', [MedicinaController::class, 'obtenerCompraID']); //Ruta para obtener un pedido por ID
Route::post('/compra', [MedicinaController::class, 'crearCompra']); // Ruta para crear pedidos
Route::put('/compra/{id}', [MedicinaController::class, 'actualizarCompra']); // Ruta para actualizar un pedido


//RUTAS PARA LABORATORIOS//
Route::get('/laboratorios', [LaboratorioController::class, 'mostrarLaboratorios']); //Ruta para obtener laboratorios
Route::get('/laboratorio/{id}', [LaboratorioController::class, 'obtenerLaboratorioID']); // Ruta para obtener Laboratorios  x ID
Route::post('/laboratorio', [LaboratorioController::class, 'crearLaboratorio']); // Ruta para crear medicinas
Route::put('/laboratorio/{id}', [LaboratorioController::class, 'actualizarLaboratorio']); // Ruta para actualizar 
Route::delete('/laboratorio/{id}', [LaboratorioController::class, 'eliminarLaboratorio']); // Ruta para eliminar 


//RUTAS PARA TELEFONO LABORATORIO//
Route::get('/laboratorio/telefonos', [TelefonoLaboratorioController::class, 'mostrarTelefonosLab']); //Ruta para obtener telefonos  de loslaboratorios
Route::get('/laboratorio/telefono/{id}', [TelefonoLaboratorioController::class, 'obtenerTelefonoID']); // Ruta para obtener telefono x ID
Route::post('/laboratorio/telefonos/crear', [TelefonoLaboratorioController::class, 'crearTelefono']); // Ruta para crear 
Route::put('/laboratorio/telefono/actualizar/{id
}', [TelefonoLaboratorioController::class, 'actualizarTelefono']); // Ruta para actualizar 
Route::delete('/laboratorio/telefono/eliminar/{id}', [TelefonoLaboratorioController::class, 'eliminarTlf']); // Ruta para eliminar 


//RUTAS PARA ACCIONTERAPEUITICA//
Route::get('/accion/terapeutica', [AccionTerapeuticaController::class, 'mostrarAT']); //Ruta para obtener telefonos  de loslaboratorios
Route::get('/accion/terapeutica/{id}', [AccionTerapeuticaController::class, 'obtenerAT']); // Ruta para obtener telefono x ID
Route::post('/accion/terapeutica/crear', [AccionTerapeuticaController::class, 'crearAT']); // Ruta para crear 
Route::put('/accion/terapeutica/actualizar/{id}', [AccionTerapeuticaController::class, 'actualizarAT']); // Ruta para actualizar 
Route::delete('/accion/terapeutica/eliminar/{id}', [AccionTerapeuticaController::class, 'eliminarAT']); // Ruta para eliminar 


//RUTAS PARA MONODROGA//
Route::get('/monodrogas', [MonodrogaController::class, 'mostrarMonodroga']); //Ruta para obtener monodrogas
Route::get('/monodroga/{id}', [MonodrogaController::class, 'obtenerMonodroga']); // Ruta para obtener x ID
Route::post('/monodroga/crear', [MonodrogaController::class, 'crearMonodroga']); // Ruta para crear 
Route::put('/monodroga/actualizar/{id}', [MonodrogaController::class, 'actualizarMonodroga']); // Ruta para actualizar 
Route::delete('/monodroga/eliminar/{id}', [MonodrogaController::class, 'eliminarMonodroga']); // Ruta para eliminar 


//RUTAS PARA MEDICAMENTO//
Route::get('/medicamentos', [MedicamentoController::class, 'mostrarMedicamento']); //Ruta para obtener monodrogas
Route::get('/medicamento/{id}', [MedicamentoController::class, 'obtenerMedicamento']); // Ruta para obtener x ID
Route::post('/medicamento/crear', [MedicamentoController::class, 'crearMedicamento']); // Ruta para crear 
Route::put('/medicamento/actualizar/{id}', [MedicamentoController::class, 'actualizarMedicamento']); // Ruta para actualizar 
Route::delete('/medicamento/eliminar/{id}', [MedicamentoController::class, 'eliminarMedicamento']); // Ruta para eliminar 



////////////////////////////////////////////////////////
///////////////// RUTAS PARA LAS VISTAS /////////////////
///////////////////////////////////////////////////////


Route::get('/', function () {
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
    }
});

Route::get('/admin/logout', function () {
    session()->forget('admin'); // Remove the admin session variable
    return redirect('/admin/login');
});

//Get:Redirigir hacia pagina
//Mandar info no visible desde un formulario
//Put
//Patch
//Delete
