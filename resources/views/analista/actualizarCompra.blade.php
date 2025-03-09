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
<h1>Formulario de Compra</h1>
    <form>

        @csrf

        <label>PedidoID</label>
        <input type="text" id =" nombre" name="nombre" required><br><br>

        <label>Fecha llegada</label>
        <input type="text" id= "precio" name="precio" required><br><br>

        <label>Precio pagar</label>
        <input type="text" id= "cantidad" name="cantidad" required><br><br>

        <label>Observación</label>
        <input type="text" id= "cantidad" name="cantidad" required><br><br>

        <label>Status</label>
        <select></select><br><br>

        <button>Enviar</button>
    </form>
@endsection