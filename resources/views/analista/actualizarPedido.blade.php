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

        <form method="POST" action="/pedido/{{$pedido->id}}">
            @csrf
            @method('PUT')

            <label>Observación</label>
            <input type="text" id= "observaciones" name="observaciones" value="{{$pedido->observaciones}}"><br><br>

            <label>Status</label>
            <select id="status" name="status">
                <option value="Pendiente" {{$pedido->status == 'Pendiente' ? 'selected' : ''}}>Pendiente</option>
                <option value="Despachado" {{$pedido->status == 'Despachado' ? 'selected' : ''}}>Despachado</option>
                <option value="Finalizado" {{$pedido->status == 'Finalizado' ? 'selected' : ''}}>Finalizado</option> 
                <option value="Cancelado" {{$pedido->status == 'Cancelado' ? 'selected' : ''}}>Cancelado</option>
            </select><br><br>

            <button>Enviar</button>
        </form>
@endsection
