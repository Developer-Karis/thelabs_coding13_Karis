@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-5 bg-white rounded card-warning">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Changer le Logo et le Slogan</h3>
            </div>
            @foreach ($banners as $item)
            <form action="/update-logo-slogan/{{$item->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body text-center">
                    <div class="form-group"><br>
                        <label for="">Logo Actuel</label><br>
                        <img src="{{asset('img/'.$item->logo)}}" alt="" height="120"><br><br>
                        <input type="file" name="updateImageLogo" id="">
                    </div>
                    <div class="form-group"><br>
                        <label for="">Slogan</label><br>
                        <input type="text" name="updateSlogan" value="{{$item->slogan}}" class="w-50">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
                </div>
            </form>
            @endforeach
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header bg-warning">
                <span class="font-weight-bold">Ajouter des Images dans le Carousel</span>
            </div>
            <form action="/create-image-carous" method="post" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Image</label><br>
                        <input type="file" name="newImageCarous">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-warning font-weight-bold">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-teal">
                <h5 class="text-dark font-weight-bold">Toutes les Images du Carousel</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image Carousel</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bannersCarous as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
                                <img src="{{asset('img/'.$item->imageCarous)}}" height="120" width="200" alt="">
                            </td>
                            <td>
                                <a href="/edit-carous/{{$item->id}}" class="btn btn-primary mr-2">Edit</a>
                                <a href="/delete-carous/{{$item->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop