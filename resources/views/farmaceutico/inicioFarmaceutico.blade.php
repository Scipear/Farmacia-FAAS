@extends('master')

@section('titulo', 'Panel de Farmaceutico')

<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/farmaceutico/inicioFarmaceutico">inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <div class="container">
            <h1>Bienvenido al Panel de Farmaceutico</h1>
            <p>¡Has iniciado sesión como farmaceutico!</p><br>
        </div>
        <b>Gestionar medicina</b>
        <a  class="botonIr" href="/farmaceutico/medicina">Ir</a><br><br><br>
        <b>Gestionar medicamento</b>
        <a  class="botonIr" href="/farmaceutico/medicamento">Ir</a><br><br><br>
        <b>Gestionar tipo de presentación</b>
        <a  class="botonIr" href="/farmaceutico/presentacion">Ir</a><br><br><br>
        <b>Gestionar acción terapéutica</b>
        <a  class="botonIr" href="/farmaceutico/accion">Ir</a><br><br><br>
        <b>Gestionar monodroga</b>
        <a  class="botonIr" href="/farmaceutico/monodroga">Ir</a><br><br><br>
@endsection