<?php

use App\Http\Controllers\EmpleadoController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Rutas para los controladores de la base de datos

Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados']); // Ruta para obtener todos los empleados
Route::post('/empleado', [EmpleadoController::class, 'crearEmpleado']); // Ruta para crear empleados
Route::put('/empleado/{empleado}', [EmpleadoController::class, 'actualizarEmpleado']); // Ruta para actualizar un empleado
Route::delete('/empleado/{empleado}', [EmpleadoController::class, 'eliminarEmpleado']); // Ruta para eliminar un empleado 

// Rutas para las vistas
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
    }});

    Route::get('/admin/logout', function () {
        session()->forget('admin'); // Remove the admin session variable
        return redirect('/admin/login');
    });

//Get:Redirigir hacia pagina
//Mandar info no visible desde un formulario
//Put
//Patch
//Delete




