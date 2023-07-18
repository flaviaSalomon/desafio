<?php
/**
 * Created by PhpStorm.
 * User: Flavia
 * Date: 16-07-2023
 * Time: 11:46
 */

?>

@extends('layout')

@section('title', 'Eliminar transacción')

@section('content')


    @if($transacciones->tipo_id == 1)
        @php
            $tipo = "Ingreso";
        @endphp
    @else
        @php
            $tipo = "Egreso";
        @endphp
    @endif
    @php
        $fecha = $transacciones->fecha;
        $fecha = explode("-", $fecha);
        $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
    @endphp

    <div class="card" style="flex-direction: row !important;">
        <h5 class="card-header"  style="background-color:#cce5ff !important;">Eliminar transacción</h5>
        <div class="card-body">
            <p class="card-text">
            <div class="alert alert-danger" role="alert">
                ¿Está seguro de eliminar este transacción?
                <table class="table table-sm table-hover">
                    <thead>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{ $transacciones->id }}</td>
                        <td>{{ $transacciones->descripcion }}</td>
                        <td>{{ $fecha }}</td>
                        <td>{{ $tipo }}</td>
                        <td>${{ number_format($transacciones->monto, 0 , ",", ".") }}</td>
                    </tr>
                    </tbody>
                    <hr>
                </table>
                <form action="{{ route('transacciones.destroy', $transacciones->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{route('transacciones.index')}}" class="btn btn-info" style="background-color: #80bdff"><span class="fas fa-undo-alt"></span>&nbsp;Volver</a>
                    <button class="btn btn-danger">Eliminar</button>
                </form>
            </div>
            </p>
        </div>
    </div>

@endsection