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
        <h1>Información de los Laboratorios</h1>

        <div>        
            <form action="/buscarLab" method="GET">
            <input type="text" name="query" placeholder="Buscar laboratorio...">
            <button type="submit">Buscar</button>
        </form>
        </div>

        <center>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Telefono(s)</th>
                    <th>Ciudad</th>
                    <th>Dirección</th>
                    <th>Correo</th>
                    <th>Opción</th>
                </tr>

                @foreach($laboratorios as $laboratorio)
                <tr>
                    <td>{{$laboratorio->nombre}}</td>

                    <td>
                        @foreach($laboratorio->telefonos as $telefono)
                            {{$telefono->numero}}<br>
                        @endforeach
                    </td>

                    <td>{{$laboratorio->ciudad}}</td>
                    <td>{{$laboratorio->direccion}}</td>
                    <td>{{$laboratorio->correo}}</td>
                    <td>
                        <div class="buttonCont">
                            @if ($laboratorio->sucursales()
                            ->where('sucursal_id', $sucursal->id)
                            ->wherePivot('fecha_final', null)
                            ->exists())
                                <form method="POST", action="/desafiliarLaboratorio/{{$laboratorio->id}}/sucursal/{{$sucursal->id}}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Desafiliar</button>
                                </form>
                                
                            @else
                                <form method="POST", action="/afiliarLaboratorio/{{$laboratorio->id}}/sucursal/{{$sucursal->id}}">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Afiliar</button>
                                </form>
                            @endif

                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </center>
@endsection