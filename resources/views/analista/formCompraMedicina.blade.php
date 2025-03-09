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
    <h1>Formulario de Compra Medicina</h1>

        <form>
            @csrf
            <label>Agregar medicina</label>
            <select></select><br><br>

            <label>Cantidad</label>
            <input type="text" id= "cantidad" name="cantidad" required><br><br>

            <button>Enviar</button>
        </form>
@endsection
