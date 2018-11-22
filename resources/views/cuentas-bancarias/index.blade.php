@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Cuentas  bancarias</div>
                    <div class="card-body">
                        <a href="{{ url('/cuentas_bancarias/create') }}" class="btn btn-success btn-sm">
                            <i class="fa fa-plus" aria-hidden="true"></i> Agregar cuenta bancaria
                        </a>

                        <form method="GET" action="{{ url('/cuentas_bancarias') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>Numero Cuenta</th>
                                        <th>Codigo Usuario</th>
                                        <th>Nombre Usuario</th>
                                        <th>Tipo Cuenta</th>
                                        <th>Monto total de la cuenta</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($cuentasbancarias as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->numero_cuenta }}</td>
                                        <td>{{ $item->cliente->codigo_usuario }}</td>
                                        <td>{{ $item->cliente->primer_nombre }} {{ $item->cliente->primer_apellido }}</td>
                                        <td>
                                            @if ($item->tipo_cuenta == 'A01')
                                                Cuenta monetaria - A01
                                            @elseif($item->tipo_cuenta == 'B01')
                                                Cuenta de ahorros - B01
                                            @elseif($item->tipo_cuenta == 'C01')
                                                Cuenta de cheques - C01
                                            @endif
                                        </td>
                                        <td>Q. {{ $item->monto_cuenta}}</td>
                                        <td>
                                            <a href="{{ url('/cuentas_bancarias' . '/' . $item->id) }}"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> Ver</button></a>
                                            <a href="{{ url('/cuentas_bancarias' . '/' . $item->id . '/edit') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                                            <form method="POST" action="{{ url('/cuentas_bancarias' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;¿Seguro que deseas elimar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $cuentasbancarias->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
