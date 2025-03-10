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
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\TelefonoEmpleadoController;
use App\Http\Middleware\VerificarRol;
use App\Models\AccionTerapeutica;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

###########################################################


// RUTAS PARA EMPLEADOS
Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados']); // Ruta para obtener todos los empleados
Route::get('/empleado/{id}', [EmpleadoController::class, 'obtenerEmpleadoID']); //Ruta para obtener un empleado por ID
Route::get('/empleado/{id}/telefonos', [EmpleadoController::class, 'obtenerTelefonosdeEmpleado']); // Ruta para obtener los telefonos de un empleado
Route::get('/buscarEmpleado', [EmpleadoController::class, 'buscarEmpleado']); //Busca empleados por el nombre
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
Route::put('/medicina/{medicinaId}/sucursal/{sucursalId}', [MedicinaController::class, 'actualizarEnSucursal']);
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
Route::get('/buscarLaboratorio', [LaboratorioController::class, 'buscarLaboratorio']); //Busca laboratorios por el nombre
Route::get('/laboratorio/{id}/medicinas', [LaboratorioController::class, 'medicinasPorLaboratorio']);
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
Route::get('/buscarMonodroga', [MonodrogaController::class, 'buscarMonodroga']);
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
Route::get('/buscarSucursal', [SucursalController::class, 'buscarSucursal']); //Busca sucursales por el nombre
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
Route::get('/buscarCargo', [CargoController::class, 'buscarCargo']); //Busca sucursales por el nombre
Route::post('/cargos', [CargoController::class, 'guardarCargo']); // Ruta para guardar cargos
Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']); // Ruta para actualizar un cargo
Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']); // Ruta para eliminar un cargo

////////////////////////////////////////////////////////
///////////////// RUTAS PARA LAS VISTAS /////////////////
///////////////////////////////////////////////////////

Route::get('/', function () {
     return view('inicio');
});

Route::get('/greet', function () {
    return view('master');
});

Route::get('/buscar', [MedicinaController::class, 'buscarMedicina']);
//Nueva ruta filtrar
Route::get('/filtrar/{busqueda}', [MedicinaController::class, 'filtrarBusqueda']);

///////////////////////////////////////////////////////////////LOGIN///////////////////////////////////////
Route::get('/login', function () {
    return view('login');
})->name('login.form');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

////////////////////////////////////////////////////////REGISTER///////////////////////////////////

Route::get('/admin/register', [AdminAuthController::class, 'showRegistrationForm'])->name('admin.register.form');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');

// RUTAS DE ADMINISTRADOR GENERAL

Route::middleware([VerificarRol::class . ':Administrador general'])->group(function (){
    
    Route::get('/admin/dashboard', function () {    
        return view('admin.dashboard'); 
    });
    
    //RUTAS SUCURSALES
    Route::get('/admin/sucursales', [SucursalController::class, 'index']); //Obtiene todas las sucursales y se la muestra al administrador
    Route::get('/editarSucursal/{id}', [SucursalController::class, 'mostrarSucursal']);    
    Route::get('/admin/formSuc', function () {
        return view('admin.formSuc');
    });
    Route::get('/admin/telfsucursal', function () {
        return view('admin.telfsucursal');
    });//revisar
    
    // RUTAS LABORATORIOS    
    Route::get('/admin/laborat', [LaboratorioController::class, 'mostrarLaboratorios']);//revisar
    Route::get('/editarLaboratorio/{id}', [LaboratorioController::class, 'obtenerLaboratorioID']);
    Route::get('/admin/formLab', function () {
        return view('admin.formLab');
    });
    Route::get('/admin/telfLab', function () {
        return view('admin.telfLab');
    });//revisar
    
    //RUTAS EMPLEADOS
    Route::get('/admin/empleados', [EmpleadoController::class, 'mostrarEmpleados']);
    Route::get('/admin/formEmp', [EmpleadoController::class, 'formEmpleado']);
    Route::get('/editarEmpleado/{id}', [EmpleadoController::class, 'obtenerEmpleadoID']);
    Route::get('/admin/telfEmpl', function () {
        return view('admin.telfEmpl');
    });
    
    Route::get('/admin/cargo', [CargoController::class, 'index']);
    Route::get('/admin/formCargo', [CargoController::class, 'formCargo']);
    Route::get('/editarCargo/{id}', [CargoController::class, 'mostrarCargo']);
    Route::get('/buscarC', function (Request $request){
        $BuscarC = $request->query('query');
        return view('admin.buscarCar', compact('BuscarC'));
    })->name('buscarC');

});

// RUTAS PARA FARMACEUTICO
Route::middleware([VerificarRol::class . ':Farmaceutico'])->group(function (){
    Route::get('/farmaceutico/inicioFarmaceutico', [EmpleadoController::class, 'obtenerSucursal']);

   //RUTAS PARA FARMACEUTICO MEDICINA
    Route::get('/farmaceutico/medicina', [MedicinaController::class, 'mostrarMedicinas']);
    Route::get('/buscarMedicina', [MedicinaController::class, 'buscarMedicina']);
    Route::get('/farmaceutico/formMedicina', [MedicinaController::class, 'formMedicina']);
    Route::get('/farmaceutico/medicina/{id}/sucursales', [MedicinaController::class, 'obtenerSucursales']);
    Route::get('/farmaceutico/{id}/formMedicinaSucursal', [MedicinaController::class, 'formMedicinaSucursal']);
    Route::get('/farmaceutico/medicina/{medicinaId}/sucursal/{sucursalId}', [MedicinaController::class, 'obtenerMedicinaSucursal']);
    
    //RUTAS PARA FARMACEUTICO MEDICAMENTO
    Route::get('/farmaceutico/medicamento', [MedicamentoController::class, 'mostrarMedicamento']);
    Route::get('/buscarMedicamento', [MedicamentoController::class, 'buscarMedicamento']);
    Route::get('/editarMedicamento/{id}', [MedicamentoController::class, 'obtenerMedicamento']);
    Route::get('/farmaceutico/formMedicamento', [MedicamentoController::class, 'formMedicamento']);
    
    //RUTAS PARA FARMACEUTICO PRESENTACION
    Route::get('/farmaceutico/presentacion', [PresentacionController::class, 'index']);
    Route::get('/buscarPre', [PresentacionController::class, 'buscarPresentacion']);
    Route::get('/editarPresentacion/{id}', [PresentacionController::class, 'mostrarPresentacion']);
    Route::get('/farmaceutico/formPre', function () {
        return view('farmaceutico.formPre');
    });
    
    //RUTAS PARA FARMACEUTICO ACCION TERAPEUTICA
    Route::get('/farmaceutico/accion', [AccionTerapeuticaController::class, 'mostrarAT']);
    Route::get('/buscarAc', [AccionTerapeuticaController::class, 'buscarAccion']);
    Route::get('/editarAccion/{id}', [AccionTerapeuticaController::class, 'obtenerAT']);
    Route::get('/farmaceutico/formAc', function () {
        return view('farmaceutico.formAc');
    });
    
    //RUTAS PARA FARMACEUTICO MONODROGA
    Route::get('/farmaceutico/monodroga', [MonodrogaController::class, 'mostrarMonodroga']); //Enseña todas las monodrogas
    Route::get('/buscarMon', [MonodrogaController::class, 'buscarMonodroga']); //Busca una monodroga
    Route::get('/editarMonodroga/{id}', [MonodrogaController::class, 'obtenerMonodroga']);
    Route::get('/farmaceutico/formMon', function () {
        return view('farmaceutico.formMon');
    });
});


//Rutas de ANALISTA
Route::middleware([VerificarRol::class . ':Analista de Compra'])->group(function (){
    Route::get('/analista/inicioAnalista', [EmpleadoController::class, 'obtenerSucursal']);

    //Rutas para Gestionar pedidos
    Route::get('/analista/pedidos', [PedidoController::class, 'mostrarPedidos']);
    Route::get('/buscarP', [PedidoController::class, 'obtenerPedidoID']);
    Route::get('/actualizarPedido/{id}', [PedidoController::class, 'editarPedido']);
    Route::get('analista/formPedido', [PedidoController::class, 'formPedido']);


    //Rutas para Gestionar compras
    Route::get('analista/compras', [CompraController::class, 'mostrarCompras']);
    Route::get('actualizarCompra/{id}', [CompraController::class, 'editarCompra']);
    Route::get('/analista/compra/{id}/formCompraMedicina', [CompraController::class, 'asignarMedicinas']);
    Route::get('/buscarC', [CompraController::class, 'obtenerCompraID']);

    //Rutas para Ver cuentas por pagar
    Route::get('/analista/cuentasxpagar', [CompraController::class, 'obtenerCuentasPorPagar']);
    Route::get('/buscarCuentaP', [CompraController::class, 'buscarCuentas']);
});


//RUTAS DE GERENTE
Route::middleware([VerificarRol::class . ':Gerente'])->group(function (){
    Route::get('/gerente/inicioGerente', [EmpleadoController::class, 'obtenerSucursal']); 
    
    //EMPLEADOS
    Route::get('/gerente/empleados', [EmpleadoController::class, 'mostrarEmpleados']);
    Route::get('/editarEmpleado/{id}', [EmpleadoController::class, 'obtenerEmpleadoID']); 

    Route::get('/buscarEmpS', function (Request $request) {
         $BuscarEmpS= $request->query('query');
         return view('gerente.buscarEmpS', compact('BuscarEmpS'));
    })->name('buscarEmpS');

    Route::get('gerente/fichaHist/{id}', [EmpleadoController::class, 'fichaHistorica']);
    Route::get('gerente/formEmp', [EmpleadoController::class, 'formEmpleado']);

    //PEDIDOS
    Route::get('/gerente/pedidos',[PedidoController::class, 'mostrarPedidos']); 
    Route::get('/buscarPedS', [PedidoController::class, 'obtenerPedidoID']);

    //COMPRAS
    Route::get('/gerente/compras', [CompraController::class, 'mostrarCompras']); 
    Route::get('/buscarCompraS', [CompraController::class, 'obtenerCompraID']);

    //LABORATOIOS
    Route::get('/gerente/laboratorios', [LaboratorioController::class, 'mostrarLaboratorios']);
    Route::put('/afiliarLaboratorio/{laboratorioId}/sucursal/{sucursalId}', [LaboratorioController::class, 'afiliarSucursal']);
    Route::put('/desafiliarLaboratorio/{laboratorioId}/sucursal/{sucursalId}', [LaboratorioController::class, 'desafiliarSucursal']);
    Route::get('/buscarLab', [LaboratorioController::class, 'buscarLaboratorio']);

    //CUENTAS POR PAGAR
    Route::get('/gerente/cuentasxpagar', [CompraController::class, 'obtenerCuentasPorPagar']); 

});

//Get:Redirigir hacia pagina
//Mandar info no visible desde un formulario
//Put
//Patch
//Delete

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
