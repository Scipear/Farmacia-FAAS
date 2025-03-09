@extends('master')

@section('titulo', 'Resultados de Búsqueda')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/">Inicio</a>
        </li>
        <li class="nav-item">
            <!--ACOMODAR EL LOGIN PARA QUE VAYA AL LOGIN  -->
            <a class="nav-link" href="/login">Login</a>
        </li>  
</ul>
</header>

@section('contenido')
<h1>Resultados de Búsqueda</h1>

    @if($busqueda)
        <p>Mostrando resultados para: <strong>{{$busqueda}}</strong></p>

        <div class="content">
          
            <form action="{{ route('filtrar') }}" method="GET">
                <input type="text" name="query" placeholder="Filtrar...">
                <button type="submit">Buscar</button>
              
            </form>
            <form action="{{ route('filtrar') }}" method="GET">
                <select name="filtro" id="filtro">
                    <option value="presentacion">Filtrar por presentación</option>
                    <option value="precio">Filtrar por precio</option>
                    <option value="sucursal">Filtrar por sucursal</option>
                </select>
                <button type="submit">Filtrar</button>
            </form>
        </div>

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
                    <span>Acetaminofen</span>
                </div>

                <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                    <strong style="display: block; margin-bottom: 5px;">Laboratorio:</strong>
                    <span>Genvem</span>
                </div>

                <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                    <strong style="display: block; margin-bottom: 5px;">Presentación:</strong>
                    <span>20mg</span>
                </div>

                <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                    <strong style="display: block; margin-bottom: 5px;">Descripción:</strong>
                    <span>Dolor</span>
                </div>

                <div style="width: 20%; margin-bottom: 10px; text-align: center;">
                    <strong style="display: block; margin-bottom: 5px;">Precio:</strong>
                    <span>20</span>
                </div>
                <!-- Agrega más detalles aquí si es necesario -->
            </div>
        </div>
        <!-- Fin del segmento de medicamento -->
    @else
        <p>No ingresaste un término de búsqueda.</p>
    @endif
@endsection
