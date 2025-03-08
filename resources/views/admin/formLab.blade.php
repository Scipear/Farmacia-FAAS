@extends('master')

@section('titulo', 'Panel de Administrador')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/admin/dashboard">inicioadmin</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Formulario de Laboratorio</h1>
    <form method="POST" action="/laboratorio">

        @csrf

        <label>Nombre</label>
        <input type="text" id ="nombre" name="nombre" required><br><br>

        <label>Ciudad</label>
        <input type="text" id= "ciudad" name="ciudad" required><br><br>

        <label>Dirección</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label>Teléfono 1 (Principal)</label>
        <input type="text" name="telefonos[0][numero]" required>
        <select id="telefonos[0][tipo]" name="telefonos[0][tipo]">
            <option value="Personal">Personal</option>
            <option value="Casa">Casa</option>
            <option value="Trabajo">Trabajo</option>
            <option value="Otro">Otro</option>
        </select><br><br>

        <label>Teléfono 2 (Opcional)</label>
        <input type="text" name="telefonos[1][numero]">
        <select id="telefonos[1][tipo]" name="telefonos[1][tipo]">
            <option value="Personal">Personal</option>
            <option value="Casa">Casa</option>
            <option value="Trabajo">Trabajo</option>
            <option value="Otro">Otro</option>
        </select><br><br>

        <label>Correo</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <button>Enviar</button>
    </form>



@endsection