@extends('master')

@section('titulo', 'Panel de Administración')

@section('contenido')
    <div class="container">
        <h1>Bienvenido al Panel de Administración</h1>
        <p>¡Has iniciado sesión como administrador!</p>
        <a href="/admin/logout" class="btn btn-danger">Cerrar Sesión</a>
    </div>
@endsection