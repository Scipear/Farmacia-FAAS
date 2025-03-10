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

        <form method="POST" action="/pedido">
            @csrf
            <h1>Analista de Compra: {{$empleado->nombre}} {{$empleado->apellido}}</h1>
            <h1>Sucursal: {{$sucursal->nombre}}</h1>

            <input type="hidden" name="empleado_id" value="{{$empleado->id}}">
            <input type="hidden" name="sucursal_id" value="{{$sucursal->id}}">

            <label>Laboratorio</label>
            <select id="laboratorio_id" name="laboratorio_id">
                <option value="">Seleccione un laboratorio</option>
                @foreach ($laboratorios as $laboratorio)
                    <option value="{{$laboratorio->id}}">{{$laboratorio->nombre}}</option>
                @endforeach
            </select><br><br>

            <label>Forma de pago</label>
            <select id="tipoPago" name="tipoPago">
                <option value="">Seleccione una Forma de pago</option>
                <option value="Al contado">Al contado</option>
                <option value="10 Dias">10 Dias</option>
                <option value="20 Dias">20 Dias</option>
                <option value="1 Mes">1 Mes</option> 
                <option value="3 Meses">3 Meses</option>    
            </select><br><br>
            
            <div id="medicina-cont">
                <label>Medicina y cantidad </label>
                <select id="medicina_id" name="medicinas[0][medicina_id]">
                    <option value="">Seleccione una medicina</option>
                </select>
                <input type="text" id="cantidad" name="medicinas[0][cantidad]"><br><br>
            </div>

            <div>
                <button type="button" onclick="agregarMedicina()">Agregar otra medicina</button>
            </div><br><br>


            <label>Observacion</label>
            <input type="text" id="observaciones" name="observaciones"><br><br>

            <button>Enviar</button>
        </form>

        <script>
            let medicinaIndex = 1;

            function agregarMedicina() {
                var select = document.createElement("select");
                select.name = `medicinas[${medicinaIndex}][medicina_id]`;
                select.innerHTML = '<option value="">Seleccione una medicina</option>';

                if(window.medicinasDisponibles) {
                    medicinasDisponibles.forEach(medicina => {
                        var option = document.createElement("option");
                        option.value = medicina.id;
                        option.text = medicina.nombre_completo;
                        select.add(option);
                    });
                }

                var cantidadInput = document.createElement("input");
                cantidadInput.type = "text";
                cantidadInput.name = `medicinas[${medicinaIndex}][cantidad]`;

                var medicinaLabel = document.createElement("label");
                medicinaLabel.textContent = "Medicina y cantidad ";

                var cantidadLabel = document.createElement("label");

                var contenedor = document.getElementById("medicina-cont");
                contenedor.appendChild(medicinaLabel);
                contenedor.appendChild(select);
                contenedor.appendChild(cantidadLabel);
                contenedor.appendChild(cantidadInput);
                contenedor.appendChild(document.createElement("br"));
                contenedor.appendChild(document.createElement("br"));

                medicinaIndex++;
            }

            document.getElementById("laboratorio_id").addEventListener('change', function() {
                var laboratorioId = this.value;
                console.log(laboratorioId);
                if(laboratorioId){
                    fetch('/laboratorio/' + laboratorioId + '/medicinas')
                        .then(response => response.json())
                        .then(medicinas => {
                            window.medicinasDisponibles = medicinas;
                            var medicinaSelect = document.getElementById('medicina_id');
                            medicinaSelect.innerHTML = '<option value="">Seleccione una medicina</option>';
                            medicinas.forEach(medicina => {
                                medicinaSelect.innerHTML += `<option value="${medicina.id}">${medicina.nombre_completo} -- Precio: $${medicina.precio_compra}</option>`;
                            });
                        });
                } else {
                    document.getElementById('medicina_id').innerHTML = '<option value="">Seleccione una medicina</option>';
                }
            });
        </script>
@endsection
