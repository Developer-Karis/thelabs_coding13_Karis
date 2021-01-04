@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="mt-5">
    <h1 class="py-3 bg-dark w-25 m-auto text-center shadow mb-5 rounded">Bannière</h1>
</div>
@stop

@section('content')
<div class="container">
    <div class="row">
        @foreach ($bannersCarous as $item)
        <div class="col">
            <div class="card m-5 shadow mb-5 mt-5 bg-white rounded">
                <img src="{{$item->imageCarous}}" class="card-img-top" alt="...">
                @foreach ($banners as $item)
                <div class="card-body text-center">
                    <img src="{{$item->logo}}" alt="" class="mt-4">
                    <p class="mt-3">{{$item->slogan}}</p>
                    <button class="btn btn-success mr-2">Ajouter</button>
                    <button class="btn btn-primary mr-2">Modifier</button>
                    <button class="btn btn-danger">Supprimer</button>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
@stop