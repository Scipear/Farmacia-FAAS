@extends('master')

@section('titulo', 'Panel de Administrador')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/admin/dashboard">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Formulario de Medicina</h1>
    <form>

        @csrf

        <label>Descripción</label>
        <input type="text" id ="descripcion" name="descripcion" required><br><br>

        <label>Precio compra</label>
        <input type="text" id= "precioCompra" name="precioCompra" required><br><br>

        <label>Precio venta</label>
        <input type="text" id= "precioVenta" name="precioVenta" required><br><br>

        <label>Laboratorio</label>
        <select></select><br><br>

        <label>Medicamento</label>
        <select></select><br><br>

        <label>Tipo presentación</label>
        <select></select><br><br>

        <button>Enviar</button>
    </form>
@endsection