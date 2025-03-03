@extends('master')

@section('titulo', 'Resultados de Búsqueda')

@section('contenido')
    <h1>Resultados de Búsqueda</h1>
    
    @if($busqueda)
        <p>Mostrando resultados para: <strong>{{$busqueda }}</strong></p>

        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Laboratorio:</th>
                <th>Presentación</th>
                <th>Descripción</th>
                <th>Precio compra</th>
                <th>Precio venta</th>
            </tr>
            <tr>
                <td>123</td>
                <td>Acetaminofen</td>
                <td>Genvem</td>
                <td>20mg</td>
                <td>Dolor </td>
                <td>10</td>
                <td>20</td>
        </table>

         <p>Para saber en que ciudad y sede esta disponible, por favor seleccione la id del medicamento, ciudad y sede</p><br>
         <label>ID  <select></select></label><br><br>
        <label>Ciudad  <select></select></label><br><br>
        <label>Sede  <select></select></label><br><br>
        <!-- if($ciudad){
            <b>Precio (Bs): </b><br><br>
            <b>Cantidad disponible: </b><br> 
        }  -->

   @else
        <p>No ingresaste un término de búsqueda.</p>
        @endif
@endsection
