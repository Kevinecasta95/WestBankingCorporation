@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Depósitos</h3>
        <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <span>Depósitos mayores <strong>Q15,000</strong></span>
                    <hr>
                    <h1 class="display-4">100</h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <span>Depósitos mayores a <strong>Q20,000</strong></span>
                    <hr>
                    <h1 class="display-4">20000</h1>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <span>Depósitos mayores a <strong>Q55,000</strong></span>
                    <hr>
                    <h1 class="display-4">50</h1>

                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                        {!! $top5Agencias->container() !!}
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body">
                    {!! $chartTop5Operarios->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
    {!! $top5Agencias->script() !!}
    {!! $chartTop5Operarios->script() !!}
    <script>
        $( document ).ready(function() {
            @if ($message = Session::get('flash_message_success'))
                toastr.success('{{ $message }}');
            @endif
            @if ($message = Session::get('flash_message_error'))
                toastr.error('{{ $message }}');
            @endif
        });
    </script>
@endsection