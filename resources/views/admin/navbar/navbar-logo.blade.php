@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="mt-5">
    <h1 class="py-3 bg-dark w-25 m-auto text-center shadow mb-5 rounded">Logo</h1>
</div>
@stop

@section('content')
<div class="container">
    <div class="card shadow mb-5 mt-5 bg-white rounded card-teal" style="width: 50%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title">New Logo</h3>
        </div>

        <form action="/update-logo" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Logo Actuel</label><br>
                    @foreach ($navbars as $item)
                    <img src="{{asset($item->logo)}}" alt=""><br><br>
                    @endforeach
                    <label for="">Changer l'image</label><br>
                    <input type="file" name="logo">
                </div>
            </div>
            <div class="card-footer card-teal">
                <button type="submit" class="btn bg-teal">Update</button>
            </div>
        </form>
    </div>
</div>
@stop