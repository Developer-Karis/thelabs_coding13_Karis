@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">You are logged in!</p>
            </div>
        </div>
        @if ($errors->any())
        <div class="shadow p-3 mb-5 font-weight-bolder rounded alert text-center bg-warning"
            style="width: max-content;">
            @foreach ($errors->all() as $error)
            {{ $error }}
            @endforeach
        </div>
        @endif
    </div>
</div>
@stop