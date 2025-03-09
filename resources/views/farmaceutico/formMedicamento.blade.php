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
    <h1>Formulario para crear un Medicamento</h1>
        <form method="POST" action="/medicamento">

            @csrf

            <label>Nombre principal</label>
            <input type="text" id ="nombre" name="nombre" required><br><br>

            <div id="monodrogas-cont">
                <label>Monodrogas: </label><br>
                <select name="monodrogas[0][monodroga_id]">
                    @foreach($monodrogas as $monodroga)
                        <option value="{{$monodroga->id}}">{{$monodroga->nombre}}</option>
                    @endforeach
                </select>
            </div><br>
            <div>
                <button type="button" onclick="agregarMonodroga()">Agregar otra monodroga</button>
            </div><br><br>
            
            <div id="acciones-cont">
                <label>Acciones Terapéuticas: </label><br>
                <select name="acciones[0][accion_id]">
                    @foreach($acciones as $accion)
                        <option value="{{$accion->id}}">{{$accion->nombre}}</option>
                    @endforeach
                </select>
            </div><br>
            
            <div>
                <button type="button" onclick="agregarAccion()">Agregar otra acción</button>
            </div><br><br>
        
            <button>Enviar</button>
        </form>
        
        <script>
            let monodrogaIndex = 1;
            let accionIndex = 1;

            function agregarMonodroga(){
                var select = document.createElement("select");
                select.name = `monodrogas[${monodrogaIndex}][monodroga_id]`;
                @foreach($monodrogas as $monodroga)
                    var option = document.createElement("option");
                    option.value = "{{$monodroga->id}}";
                    option.text = "{{$monodroga->nombre}}";
                    select.add(option);
                @endforeach
                document.getElementById("monodrogas-cont").appendChild(document.createElement("br"));
                document.getElementById("monodrogas-cont").appendChild(select);
                monodrogaIndex++;
            }
        
            function agregarAccion(){
                var select = document.createElement("select");
                select.name = `acciones[${accionIndex}][accion_id]`;
                @foreach($acciones as $accion)
                    var option = document.createElement("option");
                    option.value = "{{$accion->id}}";
                    option.text = "{{$accion->nombre}}";
                    select.add(option);
                @endforeach
                document.getElementById("acciones-cont").appendChild(document.createElement("br"));
                document.getElementById("acciones-cont").appendChild(select);
                accionIndex++;
            }
        </script>

@endsection