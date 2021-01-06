@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 50%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Changer l'image du Carousel</h3>
        </div>

        <form action="/update-image-carous/{{$editCarous->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group text-center mt-3">
                <label for="">Image Carousel</label><br>
                <img src="{{asset('img/'.$editCarous->imageCarous)}}" alt="" height="200">
            </div>
            <div class="form-group text-center mt-3">
                <label for="">Mettre une nouvelle Image</label><br>
                <input type="file" name="newImageCarous">
            </div>
            <div class="card-footer">
                <button type="submit" class="font-weight-bold btn bg-warning">Update</button>
            </div>
        </form>
    </div>
</div>
@stop