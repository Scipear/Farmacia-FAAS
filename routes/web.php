<?php

use App\Http\Controllers\EmpleadoController; 
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

//Rutas para los controladores de la base de datos


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

// Rutas para las vistas


 Route::get('/', function () {
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
    }});

    Route::get('/admin/logout', function () {
        session()->forget('admin'); // Remove the admin session variable
        return redirect('/admin/login');
    });


    // RUTAS ADMINISTRADOR
Route::get('/admin/sucursales', function () {
        return view('admin.sucursales');
});


Route::get('/admin/dashboar', function () {
    return view('admin.dashboard');
});

Route::get('/admin/telfsucursal', function () {
    return view('admin.telfsucursal');
});

Route::get('/admin/laboratoriosA', function () {
    return view('admin.laboratoriosA');
});

Route::get('/admin/laborat', function () {
    return view('admin.laborat');
});

Route::get('/admin/telfLab', function () {
    return view('admin.telfLab');
});

Route::get('/admin/empleados', function () {
    return view('admin.empleados');
});

Route::get('/admin/telfEmpl', function () {
    return view('admin.telfEmpl');
});

Route::get('/admin/cargo', function () {
    return view('admin.cargo');
});


//Get:Redirigir hacia pagina
//Mandar info no visible desde un formulario
//Put
//Patch
//Delete




