@extends('master')

@section('titulo', 'Cuentas por pagar')

@section('contenido')
    <h1>Cuentas por pagar</h1>
    
    <!-- arreglar el nombre de las columnas -->
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
@endsection
