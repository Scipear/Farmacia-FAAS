@extends('master')

@section('titulo', 'Analista de compras')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/analista/inicioAnalista">Inicio</a>
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

        <label>Nombre</label>
        <input type="text" id ="nombre" name="nombre" required><br><br>

        <label>Descripción</label>
        <input type="text" id= "descripcion" name="descripcion" required><br><br>

        <label>Precio</label>
        <input type="text" id= "precio" name="precio" required><br><br>

        <label>Cantidad</label>
        <input type="text" id= "cantidad" name="cantidad" required><br><br>

        <label>Laboratorio</label>
        <select></select><br><br>

        <label>Tipo presentación</label>
        <select></select><br><br>

        <button>Enviar</button>
    </form>
@endsection