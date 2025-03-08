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
    <form method="POST" action="/laboratorio/{{$laboratorio->id}}">

        @csrf
        @method('PUT')

        <label>Nombre</label>
        <input type="text" id ="nombre" name="nombre" value={{$laboratorio->nombre}} required><br><br>

        <label>Ciudad</label>
        <input type="text" id= "ciudad" name="ciudad" value={{$laboratorio->ciudad}} required><br><br>

        <label>Dirección</label>
        <input type="text" id="direccion" name="direccion" value={{$laboratorio->direccion}} required><br><br>

        @foreach($laboratorio->telefonos as $index => $telefono)
            <label>Teléfono {{ $index + 1 }}</label>
            <input type="text" name="telefonos[{{ $index }}][numero]" value="{{ $telefono->numero }}" required>
            <select name="telefonos[{{ $index }}][tipo]" required>
                <option value="Trabajo" {{ $telefono->tipo == 'Trabajo' ? 'selected' : '' }}>Trabajo</option>
                <option value="Casa" {{ $telefono->tipo == 'Casa' ? 'selected' : '' }}>Casa</option>
                <option value="Móvil" {{ $telefono->tipo == 'Móvil' ? 'selected' : '' }}>Móvil</option>
                <option value="Otro" {{ $telefono->tipo == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select><br><br>
        @endforeach

        @if ($laboratorio->telefonos->count() < 2)
            <label>Teléfono {{ $laboratorio->telefonos->count() + 1 }} (Opcional)</label>
            <input type="text" name="telefonos[{{ $laboratorio->telefonos->count() }}][numero]">
            <select name="telefonos[{{ $laboratorio->telefonos->count() }}][tipo]">
                <option value="Trabajo">Trabajo</option>
                <option value="Casa">Casa</option>
                <option value="Móvil">Móvil</option>
                <option value="Otro">Otro</option>
            </select><br><br>
        @endif

        <label>Correo</label>
        <input type="email" id="correo" name="correo" value={{$laboratorio->correo}}required><br><br>

        <button>Enviar</button>
    </form>
@endsection