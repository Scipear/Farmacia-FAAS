@extends('master')

@section('titulo', 'Analista de compras')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/analista/inicioAnalista">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>

@section('contenido')
    <h1>Formulario de Pedido</h1>

        <form>
            @csrf
            <label>Sucursal</label>
            <select></select><br><br>

            <label>Empleado</label>
            <select></select><br><br>

            <label>Laboratorio</label>
            <select></select><br><br>

            <label>Observación</label>
            <input type="text" id= "observacion" name="observacion" required><br><br>


            <label>Forma de pago</label>
            <input type="text" id= "formaPago" name="formaPago" required><br><br>

            <button>Enviar</button>
        </form>
@endsection
