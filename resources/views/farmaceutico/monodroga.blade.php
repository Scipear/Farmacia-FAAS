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
        <h1>Información de las Monodrogas</h1>
        <div class="container">
        </div>
        <div>       
            <form action="/buscarMon" method="GET">
                <input type="text" name="query" placeholder="Buscar Monodroga...">
                <button type="submit">Buscar</button>
            </form>
        </div>

        <a  class="botonAg" href="/farmaceutico/formMon">Agregar +</a>
        <center>
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>

                @foreach($monodrogas as $monodroga)
                    <tr>
                        <td>{{$monodroga->nombre}}</td>
                        <td>
                            <div class="buttonCont">
                                <a class="botonEd" href="/editarMonodroga/{{$monodroga->id}}">Editar</a>
                            </div>
                        </td>
                        
                    </tr>
                @endforeach

            </table>
        </center>
@endsection