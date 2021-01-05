@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success w-50 m-auto">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Modification effectuée avec Succès !</strong> {{ Session::get('message', '') }}
    </div>
    @endif
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 50%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Changer les Images du Carousel</h3>
        </div>

        <form action="/update-logo-slogan/{{$edit->id}}" method="post" enctype="multipart/form-data">
            @csrf
        </form>
    </div>
</div>
@stop