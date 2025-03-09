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
        <a  class="botonIr" href="/farmaceutico/medicina">Gestionar Medicinas</a><br><br><br>
        <a  class="botonIr" href="/farmaceutico/medicamento">Gestionar Medicamentos</a><br><br><br>
        <a  class="botonIr" href="/farmaceutico/presentacion">Gestionar Tipo de Presentaciones</a><br><br><br>
        <a  class="botonIr" href="/farmaceutico/accion">Gestionar Acciones Terapéuticas</a><br><br><br>
        <a  class="botonIr" href="/farmaceutico/monodroga">Gestionar Monodrogas</a><br><br><br>
@endsection