@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<!-- Stylesheets -->
<link rel="stylesheet" href="css/flaticon.css" />
<div class="container">
    <div class="d-flex">
        <h3 class="card-title font-weight-bold m-auto px-5 py-3 bg-warning rounded">Random 3 Elements Services</h3><br>
    </div>
    <div class="row mt-5">
        @foreach ($numbers as $item)
        @if ($loop->iteration <= 3) <div class="col-4">
            <div class="card shadow mb-5 mt-3 bg-white rounded card-warning text-center">
                <i class="{{ $servicesRapides->find($item)->icon }} fa-5x"></i>
                <h5>{{ $servicesRapides->find($item)->title }}</h5>
                <p>{{ $servicesRapides->find($item)->para }}</p>
            </div>
    </div>
    @endif
    @endforeach
</div>
@stop