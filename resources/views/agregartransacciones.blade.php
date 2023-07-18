<?php
/**
 * Created by PhpStorm.
 * User: Flavia
 * Date: 16-07-2023
 * Time: 11:19
 */

?>

@extends('layout')

@section('title', 'Agregar transacción')

@section('content')

    <div class="card" style="flex-direction: row !important;">
        <h5 class="card-header"  style="background-color:#cce5ff !important;">Agregar nueva transacción</h5>
        <div class="card-body">
            <p class="card-text">
            <form action="{{ route('transacciones.store') }}" method="POST">
                @csrf
                <label for="">Descripción</label>
                <input type="text" id="descripcion" name="descripcion" class="form-control" required>
                <label for="">Fecha</label>
                <input type="date" id="fecha" style="width: 400px" name="fecha" class="form-control" required>
                <label for="">Tipo de transacción</label>
                <select class="form-select"  style="width: 400px" name="tipo_id" id="tipo_id" required>
                    <option value="">-- Seleccione tipo de transacción -- </option>
                    @foreach($datype as $tiposTr)
                        <option value="{{ $tiposTr->id }}">{{ $tiposTr->descripcion }}</option>
                    @endforeach
                </select>
                <label for="">Monto</label>
                <input type="text" style="width: 400px" id="monto" name="monto" class="form-control" required
                       onkeyup="puntitos(this,this.value.charAt(this.value.length-1));">
                <br>
                <a href="{{route('transacciones.index')}}" class="btn btn-info"  style="background-color: #80bdff">
                    <span class="fas fa-undo-alt"></span>&nbsp;Volver</a>
                <button class="btn btn-primary">Agregar</button>
            </form>
            </p>
        </div>
    </div>

@endsection