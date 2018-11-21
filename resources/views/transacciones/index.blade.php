@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Transacciones</div>
                    <div class="card-body">
                        <form method="GET" action="{{ url('/transacciones') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                                <span class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Número de cuenta</th>
                                        <th>Código transacción</th>
                                        <th>Nombre transacción</th>
                                        <th>Fecha de la transacción</th>
                                        <th>Sucursal transacción</th>
                                        <th>Colaborador</th>
                                        <th>Aciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($transacciones as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->cuentaBancaria->numero_cuenta }}</td>
                                        <td>{{ $item->codigo_transaccion }}</td>
                                        <td>{{ $item->nombre_transaccion }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->sucursal_transaccion }}</td>
                                        <td>{{ $item->colaborador->name }}</td>
                                        <td>
                                            <a href="{{ url('/transacciones' .'/'. $item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $transacciones->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
