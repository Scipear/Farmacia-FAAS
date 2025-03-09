@extends('master')

@section('titulo', 'Resultados de Búsqueda')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <a class="nav-link active" href="/">Inicio</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login.form') }}">Login</a>
        </li> 
</ul>
</header>

@section('contenido')
    <h1>Resultados de filtrar por Ciudad o Sucursal</h1>
    
    @if($filtrarM)
        <p>Mostrando resultados para: <strong>{{$filtrarM}}</strong></p>

        <div class="cards">
            <div class="card">

                <div class="contCard">
                    <!-- <div class="imag">
                        <img src="medicinaBD">
                    </div> -->
                    <b>Nombre:</b><br><br>
                    <b>Precio:</b>
                </div>
                <button>ver</button>
            </div>

            <div class="card">

                <div class="contCard">
                    <!-- <div class="imag">
                        <img src="medicinaBD">
                    </div> -->
                    <b>Nombre:</b><br><br>
                    <b>Precio:</b>
                </div>
                <button>ver</button>
                </div>
        </div>

   @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection
