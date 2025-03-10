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
    <h1>Formulario de Compra Medicina</h1>

        <form method='POST' action="/compra/{{$compra->id}}/medicinas">
            @csrf

            <div id="medicina-cont">
                <label>Medicina y cantidad </label>
                <select id="medicina_id" name="medicinas[0][medicina_id]">
                    <option value="">Seleccione una medicina</option>
                    @foreach ($medicinas as $medicina)
                        <option value="{{$medicina->id}}">{{$medicina->medicamento->nombre}} {{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}} -- Precio: ${{$medicina->precio_compra}}</option>
                    @endforeach
                </select>
                <input type="text" id="cantidad" name="medicinas[0][cantidad]"><br><br>
            </div>

            <div>
                <button type="button" onclick="agregarMedicina()">Agregar otra medicina</button>
            </div><br><br>

            <button>Enviar</button>
        </form>

        <script>
            let medicinaIndex = 1;

            function agregarMedicina() {
                var select = document.createElement("select");
                select.name = `medicinas[${medicinaIndex}][medicina_id]`;
                select.innerHTML = '<option value="">Seleccione una medicina</option>';
                
                @foreach($medicinas as $medicina)
                    var option = document.createElement("option");
                    option.value = "{{$medicina->id}}";
                    option.text = "{{$medicina->medicamento->nombre}} {{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}} -- Precio: ${{$medicina->precio_compra}}";
                    select.add(option);
                @endforeach

                var input = document.createElement("input");
                input.type = "text";
                input.name = `medicinas[${medicinaIndex}][cantidad]`;

                var medicinaLabel = document.createElement("label");
                medicinaLabel.textContent = "Medicina y cantidad ";

                var cantidadLabel = document.createElement("label");

                var contenedor = document.getElementById("medicina-cont");
                contenedor.appendChild(medicinaLabel);
                contenedor.appendChild(select);
                contenedor.appendChild(cantidadLabel);
                contenedor.appendChild(input);
                contenedor.appendChild(document.createElement("br"));
                contenedor.appendChild(document.createElement("br"));

                medicinaIndex++;
            }
            </script>
@endsection
