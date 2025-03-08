<?php

// ##################################################
//Rutas hacia los controladores de la base de datos 
// ###############################################

use App\Http\Controllers\CompraController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\MedicinaController;
use App\Http\Controllers\PedidoController;

use App\Http\Controllers\LaboratorioController;
use App\Http\Controllers\AccionTerapeuticaController;
use App\Http\Controllers\TelefonoLaboratorioController;
use App\Http\Controllers\MonodrogaController;
use App\Http\Controllers\MedicamentoController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TelefonoEmpleadoController;
use Illuminate\Http\Request;

###########################################################


// RUTAS PARA EMPLEADOS
Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados']); // Ruta para obtener todos los empleados
Route::get('/empleado/{id}', [EmpleadoController::class, 'obtenerEmpleadoID']); //Ruta para obtener un empleado por ID
Route::get('/empleado/{id}/telefonos', [EmpleadoController::class, 'obtenerTelefonosdeEmpleado']); // Ruta para obtener los telefonos de un empleado
Route::post('/empleado', [EmpleadoController::class, 'crearEmpleado']); // Ruta para crear empleados
Route::put('/empleado/{id}', [EmpleadoController::class, 'actualizarEmpleado']); // Ruta para actualizar un empleado
Route::put('/desasignarEmpleado/{id}', [EmpleadoController::class, 'desasignarEmpleado']); // Ruta para actualizar el estado de un empleado en caso de que renuncie o sea despedido
Route::delete('/empleado/{id}', [EmpleadoController::class, 'eliminarEmpleado']); // Ruta para eliminar un empleado 

// RUTAS PARA TELEFONO DE EMPLEADOS
Route::get('/telefonosEmpleados', [TelefonoEmpleadoController::class, 'mostrarTelefonosEmpleados']);
Route::get('/telefonoEmpleado/{id}', [TelefonoEmpleadoController::class, 'obtenerTelefonoEmpleadoID']);
Route::post('/telefonoEmpleado', [TelefonoEmpleadoController::class, 'crearTelefonoEmpleado']);
Route::put('/telefonoEmpleado/{id}', [TelefonoEmpleadoController::class, 'actualizarTelefonoEmpleado']);
route::delete('telefonoEmpleado/{id}', [TelefonoEmpleadoController::class, 'eliminarTelefonoEmpleado']);

// RUTAS PARA MEDICINAS
Route::get('/medicinas', [MedicinaController::class, 'mostrarMedicinas']); // Ruta para obtener todas las medicinas
Route::get('/medicina/{id}', [MedicinaController::class, 'obtenerMedicinaID']); //Ruta para obtener una medicina por ID
Route::get('/medicina/{id}/sucursales', [MedicinaController::class, 'obtenerSucursales']); //Ruta para obtener todas las sucursales en las que se encuentra una medicina
Route::post('/medicina', [MedicinaController::class, 'crearMedicina']); // Ruta para crear medicinas
Route::post('/medicina/{id}/sucursal', [MedicinaController::class, 'agregarSucursal']);
Route::put('/medicina/{id}', [MedicinaController::class, 'actualizarMedicina']); // Ruta para actualizar una medicina
Route::delete('/medicina/{id}', [MedicinaController::class, 'eliminarMedicina']); // Ruta para eliminar una medicina

// RUTAS PARA PEDIDOS
Route::get('/pedidos', [PedidoController::class, 'mostrarPedidos']); // Ruta para obtener todos los pedidos
Route::get('/pedido/{id}', [PedidoController::class, 'obtenerPedidoID']); //Ruta para obtener un pedido por ID
Route::get("/pedido/{id}/medicinas", [PedidoController::class, 'obtenerMedicinas']);
Route::post('/pedido', [PedidoController::class, 'crearPedido']); // Ruta para crear pedidos
Route::put('/pedido/{id}', [PedidoController::class, 'actualizarPedido']); // Ruta para actualizar un pedido

// RUTAS PARA COMPRAS
Route::get('/compras', [CompraController::class, 'mostrarCompras']); // Ruta para obtener todos los pedidos
Route::get('/compra/{id}', [CompraController::class, 'obtenerCompraID']); //Ruta para obtener un pedido por ID
Route::get('/compra/{id}/medicinas', [CompraController::class, 'obtenerMedicinas']); //Ruta para obtener todas las medicinas de una compra
Route::post('/compra', [CompraController::class, 'crearCompra']); // Ruta para crear pedidos
Route::post('/compra/{id}/medicinas', [CompraController::class, 'agregarMedicinas']); //Ruta para agregar las medicinas que llegaron a una compra, no estoy seguro de si es un metodo post o put, revisar luego
Route::put('/compra/{id}', [CompraController::class, 'actualizarCompra']); // Ruta para actualizar un pedido

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
Route::post('/accion/terapeutica', [AccionTerapeuticaController::class, 'crearAT']); // Ruta para crear 
Route::put('/accion/terapeutica/{id}', [AccionTerapeuticaController::class, 'actualizarAT']); // Ruta para actualizar 
Route::delete('/accion/terapeutica/{id}', [AccionTerapeuticaController::class, 'eliminarAT']); // Ruta para eliminar 


//RUTAS PARA MONODROGA//
Route::get('/monodrogas', [MonodrogaController::class, 'mostrarMonodroga']); //Ruta para obtener monodrogas
Route::get('/monodroga/{id}', [MonodrogaController::class, 'obtenerMonodroga']); // Ruta para obtener x ID
Route::post('/monodroga', [MonodrogaController::class, 'crearMonodroga']); // Ruta para crear 
Route::put('/monodroga/{id}', [MonodrogaController::class, 'actualizarMonodroga']); // Ruta para actualizar 
Route::delete('/monodroga/{id}', [MonodrogaController::class, 'eliminarMonodroga']); // Ruta para eliminar 


//RUTAS PARA MEDICAMENTO//
Route::get('/medicamentos', [MedicamentoController::class, 'mostrarMedicamento']); //Ruta para obtener monodrogas
Route::get('/medicamento/{id}', [MedicamentoController::class, 'obtenerMedicamento']); // Ruta para obtener x ID
Route::post('/medicamento', [MedicamentoController::class, 'crearMedicamento']); // Ruta para crear 
Route::put('/medicamento/{id}', [MedicamentoController::class, 'actualizarMedicamento']); // Ruta para actualizar 
Route::delete('/medicamento/{id}', [MedicamentoController::class, 'eliminarMedicamento']); // Ruta para eliminar 

// RUTAS DE SUCURSALES
Route::get('/sucursales', [SucursalController::class, 'index']); // Ruta para obtener todas las sucursales
Route::get('/sucursales/{id}', [SucursalController::class, 'mostrarSucursal']); // Ruta para obtener una sucursal por id
Route::post('/sucursales', [SucursalController::class, 'guardarSucursal']); // Ruta para guardar sucursales
Route::put('/sucursales/{id}', [SucursalController::class, 'actualizarSucursal']); // Ruta para actualizar una sucursal
Route::delete('/sucursales/{id}', [SucursalController::class, 'eliminarSucursal']); // Ruta para eliminar una sucursal

// RUTAS DE TELEFONOS DE SUCURSALES
Route::get('/sucursales/tefonos', [SucursalController::class, 'index']); // Ruta para obtener todos los telefonos de sucursales
Route::get('/sucursales/tefonos/{id}', [SucursalController::class, 'mostrarTelefono']); // Ruta para obtener un telefono de una sucursal por id
Route::post('/sucursales/tefonos', [SucursalController::class, 'guardarTelefono']); // Ruta para guardar telefonos de sucursales
Route::put('/sucursales/tefonos/{id}', [SucursalController::class, 'actualizarTelefono']); // Ruta para actualizar un telefono de una sucursal
Route::delete('/sucursales/tefonos/{id}', [SucursalController::class, 'eliminarTelefono']); // Ruta para eliminar un telefono de una sucursal

// RUTAS DE PRESENTACIONES
Route::get('/presentaciones', [PresentacionController::class, 'index']); // Ruta para obtener todas las presentaciones
Route::get('/presentaciones/{id}', [PresentacionController::class, 'mostrarPresentacion']); // Ruta para obtener una presentacion por id
Route::post('/presentaciones', [PresentacionController::class, 'guardarPresentacion']); // Ruta para guardar presentaciones
Route::put('/presentaciones/{id}', [PresentacionController::class, 'actualizarPresentacion']); // Ruta para actualizar una presentacion
Route::delete('/presentaciones/{id}', [PresentacionController::class, 'eliminarPresentacion']); // Ruta para eliminar una presentacion

// RUTAS DE CARGOS
Route::get('/cargos', [CargoController::class, 'index']); // Ruta para obtener todos los cargos
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

// Route::get('/', function () {
//     return view('admin.telfsucursal');
// });

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
////////////////////////////////////////////////////////REGISTER///////////////////////////////////

Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');


Route::get('/admin/logout', function () {
    session()->forget('admin'); // Remove the admin session variable
    return redirect('/admin/login');
});


// RUTAS ADMINISTRADOR

Route::get('/admin/dashboar', function () {
    return view('admin.dashboard');
});


Route::get('/admin/sucursales', function () {
    return view('admin.sucursales');
});

Route::get('/admin/formSuc', function () {
    return view('admin.formSuc');
});

//Nueva ruta filtrar
Route::get('/buscarS', function (Request $request) {
    $BuscarS = $request->query('query');
    return view('admin.buscarSuc', compact('BuscarS'));
})->name('buscarS');

Route::get('/admin/telfsucursal', function () {
    return view('admin.telfsucursal');
});//revisar

Route::get('/admin/laboratoriosA', function () {
    return view('admin.laboratoriosA');
});//revisar

Route::get('/admin/laborat', function () {
    return view('admin.laborat');
});//revisar

Route::get('/buscarL', function (Request $request) {
    $BuscarL = $request->query('query');
    return view('admin.buscarLab', compact('BuscarL'));
})->name('buscarL');


Route::get('/admin/telfLab', function () {
    return view('admin.telfLab');
});//revisar

Route::get('/admin/empleados', function () {
    return view('admin.empleados');
});

Route::get('/buscarE', function (Request $request) {
    $BuscarE = $request->query('query');
    return view('admin.buscarEmp', compact('BuscarE'));
})->name('buscarE');

Route::get('/admin/telfEmpl', function () {
    return view('admin.telfEmpl');
});

Route::get('/admin/cargo', function () {
    return view('admin.cargo');
});

Route::get('/buscarC', function (Request $request) {
    $BuscarC = $request->query('query');
    return view('admin.buscarCar', compact('BuscarC'));
})->name('buscarC');


Route::get('/admin/medicina', function () {
    return view('admin.medicina');
});

Route::get('/buscarMedicina', function (Request $request) {
    $BuscarMedicina = $request->query('query');
    return view('admin.buscarMedicina', compact('BuscarMedicina'));
})->name('buscarMedicina');



Route::get('/admin/medicamento', function () {
    return view('admin.medicamento');
});

Route::get('/buscarMedicamento', function (Request $request) {
    $BuscarMedicamento = $request->query('query');
    return view('admin.buscarMedicamento', compact('BuscarMedicamento'));
})->name('buscarMedicamento');


Route::get('/admin/presentacion', function () {
    return view('admin.presentacion');
});

Route::get('/buscarPresentacion', function (Request $request) {
    $BuscarPre= $request->query('query');
    return view('admin.buscarPre', compact('BuscarPre'));
})->name('buscarPresentacion');

Route::get('/admin/acciont', function () {
    return view('admin.acciont');
});

Route::get('/buscarAc', function (Request $request) {
    $BuscarA= $request->query('query');
    return view('admin.buscarAccionT', compact('BuscarA'));
})->name('buscarAc');

Route::get('/admin/monodroga', function () {
    return view('admin.monodroga');
});

Route::get('/buscarMonodroga', function (Request $request) {
    $BuscarMonodroga= $request->query('query');
    return view('admin.buscarMon', compact('BuscarMonodroga'));
})->name('buscarMonodroga');

//Rutas para enviar formularios

Route::post('/admin/formSuc', function (\Illuminate\Http\Request $request) {
    $estadoSuc = $request->input('nombreSuc');
    $emailSuc = $request->input('email');
    $ciudadSuc = $request->input('password');
    $zonaSuc = $request->input('password');
    $direccionSuc = $request->input('password');
    $correoSuc = $request->input('password');
    return redirect('/admin/sucursales'); // Redirect to admin sucursal
})->name('admin.formSuc');

//Get:Redirigir hacia pagina
//Mandar info no visible desde un formulario
//Put
//Patch
//Delete
