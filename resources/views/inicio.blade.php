@extends('master')

@section('titulo', 'Inicio')

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