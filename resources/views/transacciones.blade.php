<?php
/**
 * Created by PhpStorm.
 * User: Flavia
 * Date: 16-07-2023
 * Time: 0:51
 */

?>

@extends('layout')

@section('title', 'Mantenedor de Transacciones')

@section('content')

    @php
        $sumingreso = 0;
        $sumegreso = 0;
        $total = 0;
        $txtTotal = "Total";
    @endphp

    <div class="card">
        <h5 class="card-header">Mantenedor de Transacciones</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    @if ($mensaje = Session::get('success'))

                        <div class="alert alert-success" role="alert">
                            {{ $mensaje }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <p><a href="{{ route("transacciones.create") }}" class="btn btn-primary">
                <span class="fas fa-plus-circle" aria-hidden="true"></span>&nbsp;Agregar transacción</a>
        </p>
        <p class="card-text">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead style="background-color: #7da0b1">
                    <th>id</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th>Tipo de transacción</th>
                    <th>Monto</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </thead>
                <tbody>
                    @forelse ($datos as $item)
                        @if($item->tipo_id == 1)
                            @php
                                $tipo = "Ingreso";
                                $sumingreso = $sumingreso + $item->monto;
                                $color = "#D0FCD7";
                            @endphp
                        @else
                            @php
                                $tipo = "Egreso";
                                $sumegreso = $sumegreso + $item->monto;
                                $color = "#FFBABA";
                            @endphp
                        @endif
                        @php
                        $total = $sumingreso - $sumegreso;
                        $fecha = $item->fecha;
                        $fecha = explode("-", $fecha);
                        $fecha = $fecha[2].'-'.$fecha[1].'-'.$fecha[0];
                        @endphp
                        <tr style="background-color: {{ $color; }}">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->descripcion }}</td>
                            <td>{{ $fecha }}</td>
                            <td>{{ $tipo }}</td>
                            <td>${{ number_format($item->monto, 0 , ",", ".")  }}</td>
                            <td>
                                <form action="{{ route('transacciones.edit', $item->id)}}" method="GET" >
                                    <button class="btn btn-warning btn-sm">
                                        <span class="fas fa-user-edit"></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('transacciones.show', $item->id)}}" method="GET" >
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-user-times"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td align="center" colspan="7">
                                <div class="alert alert-warning" role="alert">
                                    No se han ingresado transacciones.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-xl-3">
                            <div class="card order-card" style="background-color: #D0FCD7;padding-left: 10px;">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total Ingresos</h6>
                                    <h2 class="text-right"><i class="fa fa-cart-plus f-left"></i>
                                        <span>${{ number_format($sumingreso, 0 , ",", ".") }}</span>

                                    </h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xl-3">
                            <div class="card order-card" style="background-color: #FFBABA;padding-left: 10px;">
                                <div class="card-block">
                                    <h6 class="m-b-20">Total egresos</h6>
                                    <h2 class="text-right"><i class="fa fa-rocket f-left"></i>
                                        <span>${{ number_format($sumegreso, 0 , ",", ".")  }}</span>
                                    </h2>
                                </div>
                            </div>
                        </div>
                        @if ($total < 0)
                           @php
                                $txtTotal = "Se han reportado pérdidas!!";
                            @endphp
                        @elseif($total > 0)
                            @php
                                $txtTotal = "Se han reportado ganancias!!!!";
                            @endphp
                        @endif
                        <div class="col-md-4 col-xl-3">
                        <div class="card bg-c-pink order-card" style="background-color: #463C54; color: #FFFFFF; padding-left: 10px;">
                            <div class="card-block">
                                <h6 class="m-b-20">{{ $txtTotal  }}</h6>
                                <h2 class="text-right"><i class="fa fa-credit-card f-left"></i>
                                    <span>${{ number_format($total, 0 , ",", ".") }}</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </p>
    </div>
@endsection