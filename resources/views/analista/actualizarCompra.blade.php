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
<h1>Actualizando la Compra con codigo {{$compra->id}}</h1>
    <form method="POST" action="/compra/{{$compra->id}}">

        @csrf
        @method('PUT')

        <label>Status</label>
            <select id="status" name="status">
                <option value="Pendiente" {{$compra->status == 'Pendiente' ? 'selected' : ''}}>Pendiente</option>
                <option value="Por Pagar" {{$compra->status == 'Por Pagar' ? 'selected' : ''}}>Por Pagar</option>
                <option value="Pagada" {{$compra->status == 'Pagada' ? 'selected' : ''}}>Pagada</option> 
            </select><br><br>

        <label>Observación</label>
        <input type="text" id= "observaciones" name="observaciones" value={{$compra->observaciones}}><br><br>

        <button>Enviar</button>
    </form>
@endsection