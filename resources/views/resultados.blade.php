@extends('master')

@section('titulo', 'Resultados de Búsqueda')

@section('contenido')
    <h1>Resultados de Búsqueda</h1>
    
    @if($busqueda)
        <p>Mostrando resultados para: <strong>{{ $busqueda }}</strong></p>
    @else
        <p>No ingresaste un término de búsqueda.</p>
    @endif
@endsection
