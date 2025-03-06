<?php

//use App\Http\Controllers\EmpleadoController; 
//use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
  //  return view('welcome');
//});

//Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados']); // Ruta para obtener todos los empleados
//Route::post('/empleado', [EmpleadoController::class, 'crearEmpleado']); // Ruta para crear empleados
//Route::put('/empleado/{empleado}', [EmpleadoController::class, 'actualizarEmpleado']); // Ruta para actualizar un empleado
//Route::delete('/empleado/{empleado}', [EmpleadoController::class, 'eliminarEmpleado']); // Ruta para eliminar un empleado 



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CargoController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\SucursalController;



Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/greet', function () {
    return view('master');
});

Route::get('/buscar', function (Request $request) {
    $busqueda = $request->query('query');
    return view('resultados', compact('busqueda'));
})->name('buscar');

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

// RUTAS DE SUCURSALES
Route::get('/sucursales', [SucursalController::class, 'index']); // Ruta para obtener todas las sucursales
Route::get('/sucursales/{id}', [SucursalController::class, 'mostrarSucursal']); // Ruta para obtener una sucursal por id
Route::get('/sucursales/create', [SucursalController::class, 'crearSucursal']); // Ruta para crear sucursales
Route::post('/sucursales', [SucursalController::class, 'guardarSucursal']); // Ruta para guardar sucursales
Route::get('/sucursales/{id}/edit', [SucursalController::class, 'editarSucursal']); // Ruta para editar una sucursal
Route::put('/sucursales/{id}', [SucursalController::class, 'actualizarSucursal']); // Ruta para actualizar una sucursal
Route::delete('/sucursales/{id}', [SucursalController::class, 'eliminarSucursal']); // Ruta para eliminar una sucursal
// RUTAS DE TELEFONOS DE SUCURSALES
Route::get('/sucursales/tefonos', [SucursalController::class, 'index']); // Ruta para obtener todos los telefonos de las sucursales
Route::get('/sucursales/tefonos/{id}', [SucursalController::class, 'mostrarTelefono']); // Ruta para obtener un telefono de una sucursal por id
Route::get('/sucursales/tefonos/create', [SucursalController::class, 'crearTelefono']); // Ruta para crear telefonos de sucursales
Route::post('/sucursales/tefonos', [SucursalController::class, 'guardarTelefono']); // Ruta para guardar telefonos de sucursales
Route::get('/sucursales/tefonos/{id}/edit', [SucursalController::class, 'editarTelefono']); // Ruta para editar un telefono de una sucursal
Route::put('/sucursales/tefonos/{id}', [SucursalController::class, 'actualizarTelefono']); // Ruta para actualizar un telefono de una sucursal
Route::delete('/sucursales/tefonos/{id}', [SucursalController::class, 'eliminarTelefono']); // Ruta para eliminar un telefono de una sucursal

// RUTAS DE PRESENTACIONES
Route::get('/presentaciones', [PresentacionController::class, 'index']); // Ruta para obtener todas las presentaciones
Route::get('/presentaciones/{id}', [PresentacionController::class, 'mostrarPresentacion']); // Ruta para obtener una presentacion por id
Route::get('/presentaciones/create', [PresentacionController::class, 'crearPresentacion']); // Ruta para crear presentaciones
Route::post('/presentaciones', [PresentacionController::class, 'guardarPresentacion']); // Ruta para guardar presentaciones
Route::get('/presentaciones/{id}/edit', [PresentacionController::class, 'editarPresentacion']); // Ruta para editar una presentacion
Route::put('/presentaciones/{id}', [PresentacionController::class, 'actualizarPresentacion']); // Ruta para actualizar una presentacion
Route::delete('/presentaciones/{id}', [PresentacionController::class, 'eliminarPresentacion']); // Ruta para eliminar una presentacion

// RUTAS DE CARGOS
Route::get('/cargos', [CargoController::class, 'index']); // Ruta para obtener todos los cargos
Route::get('/cargos/{id}', [CargoController::class, 'mostrarCargo']); // Ruta para obtener un cargo por id
Route::get('/cargos/create', [CargoController::class, 'crearCargo']); // Ruta para crear cargos
Route::post('/cargos', [CargoController::class, 'guardarCargo']); // Ruta para guardar cargos
Route::get('/cargos/{id}/edit', [CargoController::class, 'editarCargo']); // Ruta para editar un cargo
Route::put('/cargos/{id}', [CargoController::class, 'actualizarCargo']); // Ruta para actualizar un cargo
Route::delete('/cargos/{id}', [CargoController::class, 'eliminarCargo']); // Ruta para eliminar un cargo

//Get:Redirigir hacia pagina
//Mandar info no visible desde un formulario
//Put
//Patch
//Delete




