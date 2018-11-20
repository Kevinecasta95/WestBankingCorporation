@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Cliente {{ $cliente->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/clientes') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <a href="{{ url('/clientes'. '/' . $cliente->id . '/edit') }}"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Editar</button></a>

                        <form method="POST" action="{{ url('clientes' . '/' . $cliente->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;¿Seguro que deseas elimar?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Eliminar</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $cliente->id }}</td>
                                    </tr>
                                    <tr><th> Codigo Usuario </th><td> {{ $cliente->codigo_usuario }} </td></tr><tr><th> Primer Nombre </th><td> {{ $cliente->primer_nombre }} </td></tr><tr><th> Segundo Nombre </th><td> {{ $cliente->segundo_nombre }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
