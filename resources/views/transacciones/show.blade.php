@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Transaccion #{{ $transaccion->id }}</div>
                    <div class="card-body">
                        <a href="{{ url('/transacciones') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $transaccion->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Número de cuenta </th>
                                        <td> {{ $transaccion->cuentaBancaria->numero_cuenta }} </td>
                                    </tr>
                                    <tr>
                                        <th> Código de la transacción </th>
                                        <td> {{ $transaccion->codigo_transaccion }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nombre de la transacción </th>
                                        <td> {{ $transaccion->nombre_transaccion }} </td>
                                    </tr>
                                    <tr>
                                        <th> Monto de la transacción </th>
                                        <td> {{ $transaccion->monto_transaccion }} </td>
                                    </tr>
                                    <tr>
                                        <th> Comentarios de la transacción </th>
                                        <td> {{ $transaccion->comentarios_transaccion }} </td>
                                    </tr>
                                    <tr>
                                        <th> Sucursal de la transacción </th>
                                        <td> {{ $transaccion->sucursal_transaccion }} </td>
                                    </tr>
                                    <tr>
                                        <th> Colaborador de la transacción </th>
                                        <td> {{ $transaccion->colaborador->name }} </td>
                                    </tr>
                                    <tr>
                                        <th> Fecha de la transacción </th>
                                        <td> {{ $transaccion->created_at }} </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
