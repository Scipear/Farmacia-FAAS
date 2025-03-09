@extends('master')

@section('titulo', 'Panel de Gerente')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/inicioGerente">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/login">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Formulario para crear un Empleado</h1>
    <form>
        @csrf

        <label>Cédula</label>
        <input type="text" id ="cedula" name="cedula" required><br><br>

        <label>Nombre</label>
        <input type="text" id ="nombre" name="nombre" required><br><br>

        
        <label>Apellido</label>
        <input type="text" id ="apellido" name="apellido" required><br><br>

        <label>Teléfono</label>
        <input type="text" id= "telefonoRe" name="telefonoRe" required><br><br>

        <label>Teléfono opcional</label>
        <input type="text" id= "telefonoOp" name="telefonoOp"><br><br>

        <label>Cargo</label>
        <input type="text" id= "cargo" name="cargo" required><br><br>

        <label>Sucursal</label>
        <input type="text" id= "sucursal" name="sucursal" required><br><br>

        <label>Dirección</label>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label>Correo</label>
        <input type="email" id="correo" name="correo" required><br><br>

        <label>Status</label>
        <select id="status" name="status" required>
            <option value="Activo">Activo</option>
            <option value="En construccion">En construcción</option>
            <option value="En mantenimiento">En mantenimiento</option>
            <option value="Cerrado temporalmente">Cerrado temporalmente</option>
            <option value="Cerrado permanentemente">Cerrado temporalmente</option>
            </select><br><br>

        <button>Enviar</button>
    </form>



@endsection