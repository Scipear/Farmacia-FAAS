@extends('master')

@section('titulo', 'Inicio')

<header>
@yield('header', 'Farmacias FAAS')
<ul class="nav-tabs"> <!-- Pestañas dentro del header -->
        <li class="nav-item">
            <!--ACOMODAR EL LOGIN PARA QUE VAYA AL LOGIN  -->
            <a class="nav-link" href="/login">Login</a>
        </li>  
</ul>

</header>

@section('contenido')

    <div class="content">
        <h1>Bienvenido</h1>
        <p>Encuentra lo que buscas fácilmente</p>

        <form action="{{ route('buscar') }}" method="GET">
            <input type="text" name="query" placeholder="Buscar...">
            <button type="submit">Buscar</button>
        </form>
    </div>

@endsection