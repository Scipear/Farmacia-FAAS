<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/empleados', [EmpleadoController::class, 'mostrarEmpleados']); // Ruta para obtener todos los empleados
Route::post('/empleado', [EmpleadoController::class, 'crearEmpleado']); // Ruta para crear empleados
Route::put('/empleado/{empleado}', [EmpleadoController::class, 'actualizarEmpleado']); // Ruta para actualizar un empleado
Route::delete('/empleado/{empleado}', [EmpleadoController::class, 'eliminarEmpleado']); // Ruta para eliminar un empleado
