@extends('master')

@section('titulo', 'Panel de Gerente')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">    
            <a class="nav-link active" href="/gerente/empleados">Volver</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/gerente/inicioGerente">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/logout">Cerrar Sesión</a>
        </li>  
</ul>
</header>

@section('contenido')
    <h1>Ficha historica del empleado {{$empleado->nombre}} {{$empleado->apellido}}</h1>

    <p>FICHA HISTORICA EMPLEADO CARGO</p>
        
        <center>
            <table>
                <tr>
                    <th>Cargo</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                </tr>
                @foreach ($cargos as $cargo)
                    <tr>
                        <td>{{$cargo->nombre}}</td>
                        <td>{{$cargo->pivot->fechaInicio}}</td>
                        <td>{{$cargo->pivot->fechaFinal}}</td>
                    </tr>
                @endforeach
            </table>
        </center>

        <p>FICHA HISTORICA EMPLEADO SUCURSAL</p>

        <center>
            <table>
                <tr>
                    <th>Sucursal</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                </tr>
                @foreach ($sucursales as $sucursal)
                    <tr>
                        <td>{{$sucursal->nombre}}</td>
                        <td>{{$sucursal->pivot->fecha_inicio}}</td>
                        <td>{{$sucursal->pivot->fecha_final}}</td>
                    </tr>
                @endforeach
            </table>

        </center>


@endsection