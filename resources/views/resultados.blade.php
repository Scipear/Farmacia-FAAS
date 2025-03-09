@extends('master')

@section('titulo', 'Resultados de Búsqueda')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
        </li>  
</ul>
</header>

@section('contenido')
<h1>Resultados de Búsqueda</h1>

    @if($busqueda)
        <p>Mostrando resultados para: <strong>{{$busqueda}}</strong></p>

        <div class="content">
          
            <form action="/buscar" method="GET">
                <input type="text" name="query" placeholder="Buscar...">
                <button type="submit">Buscar</button>
              
            </form>
            <form action="/filtrar/{{$busqueda}}" method="GET">
                <select name="sucursal_id" id="filtro">
                    <option value="">Filtrar por Sucursal</opcion>
                    @foreach ($sucursales as $sucursal)
                        <option value="{{$sucursal->id}}">Sucursal: {{$sucursal->nombre}} Ciudad: {{$sucursal->ciudad}}</option>
                    @endforeach
                </select>
                
                <select name="presentacion_id" id="filtro">
                    <option value="">Filtrar por Presentación</option>
                    @foreach ($presentaciones as $presentacion)
                    <option value="{{$presentacion->id}}">{{$presentacion->unidades}} {{$presentacion->tipo}} {{$presentacion->cantidad}} {{$presentacion->medida}}</option>
                    @endforeach
                </select>
                
                <button type="submit">Filtrar</button>
            </form>
        </div>
        @foreach($medicinas as $medicina)
            
            <!-- Segmento de medicamento-->
            <div style="border: 1px solid #ccc; margin-bottom: 20px; padding: 10px; width: 80%; margin-left: auto; margin-right: auto;">
                <!-- Sección de imagen del medicamento -->
                <div style="text-align: center; margin-bottom: 10px;">
                    <img src="{{ asset('medicinaBD.jpg') }}" alt="Imagen del medicamento" style="max-width: 100px; height: auto;">
                </div>

                <!-- Sección de detalles del medicamento (horizontal) -->
                <div style="display: flex; flex-wrap: wrap; justify-content: space-around;">
                    <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                        <strong style="display: block; margin-bottom: 5px;">Nombre:</strong>
                        <span>{{$medicina->medicamento->nombre}}</span>
                    </div>

                    <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                        <strong style="display: block; margin-bottom: 5px;">Laboratorio:</strong>
                        <span>{{$medicina->laboratorio->nombre}}</span>
                    </div>

                    <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                        <strong style="display: block; margin-bottom: 5px;">Presentación:</strong>
                        <span>{{$medicina->presentacion->unidades}} {{$medicina->presentacion->tipo}} {{$medicina->presentacion->cantidad}} {{$medicina->presentacion->medida}}</span>
                    </div>

                    <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                        <strong style="display: block; margin-bottom: 5px;">Descripción:</strong>
                        <span>{{$medicina->descripcion}}</span>
                    </div>

                    <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                        <strong style="display: block; margin-bottom: 5px;">Precio:</strong>
                        <span>$ {{$medicina->precio_venta}}</span>
                    </div>
                    <!-- Agrega más detalles aquí si es necesario -->
                </div>
        </div>
        @endforeach
        <!-- Fin del segmento de medicamento -->
    @else
        <p>No ingresaste un término de búsqueda.</p>
    @endif
@endsection
