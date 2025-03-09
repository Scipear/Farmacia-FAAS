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
    <h1>Formulario de Surcursales</h1>
    <form method="POST" action="/sucursales/{{$sucursal->id}}">

        @csrf
        @method('PUT')

        <label>Nombre</label>
        <input type="text" id ="nombre" name="nombre" value={{$sucursal->nombre}} required><br><br>

        <label>Estado</label>
        <input type="text" id= "estado" name="estado" value={{$sucursal->estado}} required><br><br>

        <label>Ciudad</label>
        <input type="text" id= "ciudad" name="ciudad" value={{$sucursal->ciudad}} required><br><br>

        <label>Zona</label>
        <input type="text" id= "zona" name="zona" value={{$sucursal->zona}} required><br><br>

        <label>Dirección</label>
        <input type="text" id="direccion" name="direccion" value={{$sucursal->direccion}} required><br><br>

        @foreach($sucursal->telefonos as $index => $telefono)
            <label>Teléfono {{$index + 1}}</label>
            <input type="text" name="telefonos[{{$index}}][numero]" value="{{$telefono->numero}}" required>
            <select name="telefonos[{{$index}}][tipo]" required>
                <option value="Local" {{$telefono->tipo == 'Local' ? 'selected' : ''}}>Local</option>
                <option value="Movil" {{$telefono->tipo == 'Movil' ? 'selected' : ''}}>Movil</option>
                <option value="Otro" {{$telefono->tipo == 'Otro' ? 'selected' : ''}}>Otro</option>
            </select><br><br>
        @endforeach

        @if($sucursal->telefonos->count() < 2)
            <label>Teléfono {{ $sucursal->telefonos->count() + 1 }} (Opcional)</label>
            <input type="text" name="telefonos[{{$sucursal->telefonos->count()}}][numero]">
            <select name="telefonos[{{$sucursal->telefonos->count()}}][tipo]">
                <option value="Local">Local</option>
                <option value="Movil">Movil</option>
                <option value="Otro">Otro</option>
            </select><br><br>
        @endif

        <label>Correo</label>
        <input type="email" id="correo" name="correo" value={{$sucursal->correo}} required><br><br>

        <label>Status</label>

        <select id="status" name="status" required>
            <option value="Activo" {{$sucursal->status == 'Activo' ? 'selected' : ''}}>Activo</option>
            <option value="En construccion" {{$sucursal->status == 'En construccion' ? 'selected' : ''}}>En construcción</option>
            <option value="En mantenimiento" {{$sucursal->status == 'En mantenimiento' ? 'selected' : ''}}>En mantenimiento</option>
            <option value="Cerrado temporalmente" {{$sucursal->status == 'Cerrado temporalmente' ? 'selected' : ''}}>Cerrado temporalmente</option>
            <option value="Cerrado permanentemente" {{$sucursal->status == 'Cerrado permanentemente' ? 'selected' : ''}}>Cerrado permanentemente</option>
        </select><br><br>

        <button>Enviar</button>
    </form>



@endsection