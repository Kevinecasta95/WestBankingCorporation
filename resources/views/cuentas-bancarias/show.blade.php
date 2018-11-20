@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Cuenta bancaria {{ $cuentasbancaria->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/cuentas_bancarias') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/cuentas_bancarias' . '/' . $cuentasbancaria->id . '/edit') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('cuentas_bancarias' . '/' . $cuentasbancaria->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th>
                                        <td>{{ $cuentasbancaria->id }}</td>
                                    </tr>
                                    <tr>
                                        <th> Numero Cuenta </th><td> {{ $cuentasbancaria->numero_cuenta }} </td>
                                    </tr>
                                    <tr>
                                        <th> Codigo Usuario </th><td> {{ $cuentasbancaria->cliente->codigo_usuario }} </td>
                                    </tr>
                                    <tr>
                                        <th> Nombre cliente </th>
                                        <td> {{ $cuentasbancaria->cliente->primer_nombre }} {{ $cuentasbancaria->cliente->segundo_nombre }} {{ $cuentasbancaria->cliente->primer_apellido }} {{ $cuentasbancaria->cliente->segundo_apellido }}</td>
                                    </tr>
                                    <tr>
                                        <th> Tipo Cuenta </th>
                                        <td>
                                            @if ($cuentasbancaria->tipo_cuenta == 'A01')
                                                Cuenta monetaria - A01
                                            @elseif($cuentasbancaria->tipo_cuenta == 'B01')
                                                Cuenta de ahorros - B01
                                            @elseif($cuentasbancaria->tipo_cuenta == 'C01')
                                                Cuenta de cheques - C01
                                            @endif
                                        </td>
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
