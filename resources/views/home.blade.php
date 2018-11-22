@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
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