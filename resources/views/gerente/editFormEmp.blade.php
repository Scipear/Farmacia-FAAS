@extends('master')

@section('titulo', 'Panel de Gerente')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
            <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
    <h1>Formulario para crear un Empleado</h1>
    <form method="POST" action="/empleado/{{$empleado->id}}">
        @csrf
        @method('PUT')

        <label>Cédula</label>
        <input type="text" id="cedula" name="cedula" value="{{$empleado->cedula}}" required><br><br>

        <label>Nombre</label>
        <input type="text" id="nombre" name="nombre" value="{{$empleado->nombre}}" required><br><br>
        
        <label>Apellido</label>
        <input type="text" id="apellido" name="apellido" value="{{$empleado->apellido}}" required><br><br>

        @foreach($empleado->telefonos as $index => $telefono)
            <label>Teléfono {{$index + 1}}</label>
            <input type="text" name="telefonos[{{$index}}][numero]" value="{{$telefono->numero}}" required>
            <select name="telefonos[{{$index}}][tipo]" required>
                <option value="Personal" {{$telefono->tipo == 'Personal' ? 'selected' : ''}}>Personal</option>
                <option value="Trabajo" {{$telefono->tipo == 'Trabajo' ? 'selected' : ''}}>Trabajo</option>
                <option value="Casa" {{$telefono->tipo == 'Casa' ? 'selected' : ''}}>Casa</option>
                <option value="Otro" {{$telefono->tipo == 'Otro' ? 'selected' : ''}}>Otro</option>
            </select><br><br>
        @endforeach

        @if($empleado->telefonos->count() < 2)
            <label>Teléfono {{$empleado->telefonos->count() + 1}} (Opcional)</label>
            <input type="text" name="telefonos[{{$empleado->telefonos->count()}}][numero]">
            <select name="telefonos[{{$empleado->telefonos->count()}}][tipo]">
                <option value="">Seleccione un tipo</option>
                <option value="Personal">Personal</option>
                <option value="Trabajo">Trabajo</option>
                <option value="Casa">Casa</option>
                <option value="Otro">Otro</option>
            </select><br><br>
        @endif

        <label>Cargo</label>
        <select id="cargo" name="cargo">
            @foreach($cargos as $cargo)
                <option value="{{$cargo->id}}" {{$cargo->id == $empleado->cargoActual->id ? 'selected' : ''}}>
                    {{$cargo->nombre}}
                </option>
            @endforeach
        </select><br><br>

        <label>Sucursal</label>
        <select id="sucursal" name="sucursal">
            @foreach($sucursales as $sucursal)
                <option value="{{$sucursal->id}}" {{$sucursal->id == $empleado->sucursalActual->id ? 'selected' : ''}}>
                    {{$sucursal->nombre}}
                </option>
            @endforeach
        </select><br><br>

        <label>Dirección</label>
        <input type="text" id="direccion" name="direccion" value="{{$empleado->direccion}}" required><br><br>

        <label>Correo</label>
        <input type="email" id="correo" name="correo" value="{{$empleado->correo}}" required><br><br>

        <label>Status</label>
        <select id="status" name="status" required>
            <option value="Activo" {{$empleado->status == 'Activo' ? 'selected' : ''}}>Activo</option>
            <option value="Reposo" {{$empleado->status == 'Reposo' ? 'selected' : ''}}>Reposo</option>
            <option value="Vacaciones" {{$empleado->status == 'Vacaciones' ? 'selected' : ''}}>Vacaciones</option>
            <option value="Jubilado" {{$empleado->status == 'Jubilado' ? 'selected' : ''}}>Jubilado</option>
            <option value="Retirado" {{$empleado->status == 'Retirado' ? 'selected' : ''}}>Retirado</option>
            <option value="Despedido" {{$empleado->status == 'Despedido' ? 'selected' : ''}}>Despedido</option>
        </select><br><br>

        <button>Enviar</button>
    </form>



@endsection