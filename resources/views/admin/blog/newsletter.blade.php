@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class="col-4">
        <div class="card">
            <div class="card-header bg-warning">
                <h5 class="text-dark font-weight-bold">Ne possède pas de compte et est inscrit à la Newsletter</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    @foreach ($mails->unique('email') as $item)
                    <h5>{{$item->email}}</h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="card">
            <div class="card-header bg-teal">
                <h5 class="text-dark font-weight-bold">Possède un compte et est inscrit à la Newsletter</h5>
            </div>
            <div class="card-body">
                <div class="form-group">
                    @foreach ($userInfos->unique('email') as $item)
                    <h5>{{$item->name}} - {{$item->email}}</h5>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@stop