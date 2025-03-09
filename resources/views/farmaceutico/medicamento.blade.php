@extends('master')

@section('titulo', 'Panel de Farmaceutico')
<header>
    @yield('header', 'Farmacias FAAS')
    <ul class="nav-tabs"> <!-- Pestañas dentro del header -->
            <li class="nav-item">
                <a class="nav-link active" href="/farmaceutico/inicioFarmaceutico">Inicio</a>
            </li>
            <li class="nav-item">
                <a  class="nav-link active" href="/admin/logout">Cerrar Sesión</a>
            </li>
    </ul>
</header>
@section('contenido')
        <h1>Información de los Medicamentos</h1>
        <div class="container">
        </div>
        <div>        
            <form action="/buscarMedicamento" method="GET">
                <input type="text" name="query" placeholder="Buscar medicamento...">
                <button type="submit">Buscar</button>
            </form>
        </div>

            <a class="botonAg" href="/farmaceutico/formMedicamento">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>Nombre principal</th>
                    <th>Monodrogas</th>
                    <th>Acciones Terapeuticas</th>
                    <th>Opciones</th>
                </tr>

                @foreach($medicamentos as $medicamento)  
                    <tr>
                        <td>{{$medicamento->nombre}}</td>

                        <td>
                            @foreach($medicamento->monodrogas as $monodroga)
                                {{$monodroga->nombre}}<br>
                            @endforeach
                        </td>

                        <td>
                            @foreach($medicamento->accionTerapeutica as $accion)
                                {{$accion->nombre}}<br>
                            @endforeach
                        </td>

                        <td>
                            <div class="buttonCont">
                                <a class="botonEd" href="/medicamento/{{$medicamento->id}}">Editar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </center>
@endsection