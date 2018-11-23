@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">Generar cheque</div>
                    <div class="card-body">
                            <a href="{{ url('/') }}"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Regresar</button></a>
                        <br />
                        <br />
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <form method="POST" action="{{ url('/cheques') }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @include ('common.formTransaccion', [$cuentasBancarias, 'text' => 'Generar cheque', 'type' => 'cheque'])

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
