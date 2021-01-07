@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<!-- Stylesheets -->
<link rel="stylesheet" href="css/flaticon.css" />
<div class="row">
    <div class="col-6">
        <div class="card shadow bg-white rounded card-warning">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Ajouter un Service</h3>
            </div>
            <form action="/store-testimonial" method="post">
                @csrf
                <div class="text-center">
                    <div class="form-group">
                        <label for="">Choisis une Icône</label>
                        <select name="service" class="form-control m-auto" style="width: 35%;">
                            @foreach ($services as $item)
                            <option value="{{$item->id}}">
                                {{$item->icon}}</option>
                            @endforeach
                        </select>
                        @foreach ($services as $item)
                        <i class="{{$item->icon }} fa-4x"></i>
                        @endforeach
                    </div>
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" name="newFullName" class="form-control m-auto" style="width: 35%;">
                    </div>
                    <div class="form-group">
                        <label for="">Para</label>
                        <textarea name="para" rows="6" class="form-control m-auto" style="resize: none; width: 35%;">

                        </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-warning font-weight-bold">Créer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-teal">
                <h5 class="text-dark font-weight-bold">Toutes les infos des Icônes Services</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Title</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($services as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
                                <i class="{{$item->icon}} fa-4x"></i>
                            </td>
                            <td>{{$item->title}}</td>
                            <td>
                                <a href="/edit-service/{{$item->id}}" class="btn btn-primary mr-2">Edit</a>
                                <a href="/delete-service/{{$item->id}}" class="btn btn-danger">Delete</a>
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