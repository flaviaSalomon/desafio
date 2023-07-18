<?php
/**
 * Created by PhpStorm.
 * User: Flavia
 * Date: 16-07-2023
 * Time: 11:42
 */

?>

@extends('layout')

@section('title', 'Actualizar transacción')

@section('content')

    <div class="card" style="flex-direction: row !important;">
        <h5 class="card-header" style="background-color:#fde496 !important;">Actualizar Transacción</h5>
        <div class="card-body" >
            <p class="card-text">
            <form class="form-horizontal" role="form" action="{{ route('transacciones.update', $transacciones->id) }}" method="post">
                @csrf
                @method("PUT")
                <label for="">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required value="{{ $transacciones->descripcion }}">
                <label for="">Fecha</label>
                <input type="date" id="fecha" name="fecha"  style="width: 400px" class="form-control" required value="{{ $transacciones->fecha }}">
                <label for="">Tipo de transacción</label>
                <select class="form-select" style="width: 400px" name="tipo_id" id="tipo_id" required>
                        @if ($transacciones->tipo_id == 1)
                            <option selected value="{{ $transacciones->tipo_id }}">Ingreso</option>
                            <option value="2">Egreso</option>
                        @elseif($transacciones->tipo_id == 2)
                            <option value="1">Ingreso</option>
                            <option selected value="{{ $transacciones->tipo_id  }}">Egreso</option>
                        @endif
                </select>
                <label for="">Monto</label>
                <input type="text" id="monto" style="width: 400px" name="monto" class="form-control"
                       required value="{{ number_format($transacciones->monto, 0 , ",", ".") }}"
                       onkeyup="puntitos(this,this.value.charAt(this.value.length-1));">
                <br>
                <a href="{{route('transacciones.index')}}" class="btn btn-info" style="background-color: #80bdff">
                    <span class="fas fa-undo-alt"></span>&nbsp;Volver</a>
                <button class="btn btn-warning">Actualizar</button>
            </form>
            </p>
        </div>
    </div>

@endsection