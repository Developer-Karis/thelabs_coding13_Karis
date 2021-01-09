@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<!-- Stylesheets -->
<link rel="stylesheet" href="css/flaticon.css" />
<div class="row">
    <div class="col-6">
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 1000);
        </script>
        @endif
        <div class="card shadow bg-white rounded card-warning">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Ajouter un Service</h3>
            </div>
            <form action="/store-service" method="post">
                @csrf
                <div class="text-center">
                    <div class="form-group">
                        <label for="">Choisis une Icône</label>
                        <select name="newService" class="form-control m-auto" style="width: 35%;">
                            @foreach ($services->unique('icon') as $item)
                            <option value="{{$item->icon}}">
                                {{$item->icon}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Titre</label>
                        <input type="text" name="newTitle" class="form-control m-auto" style="width: 35%;">
                    </div>
                    <div class="form-group">
                        <label for="">Para</label>
                        <textarea name="newPara" rows="6" class="form-control m-auto" style="resize: none; width: 35%;">

                        </textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-warning font-weight-bold">Créer</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow bg-white rounded card-warning">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Modifier le Titre Principal et le Button</h3>
            </div>
            <form action="/update-title-service/{{$services[0]->id}}" method="post">
                @csrf
                <div class="text-center">
                    <div class="form-group mt-3">
                        <label for="">Titre</label>
                        <input type="text" name="main_title" class="form-control w-50 m-auto"
                            value="{{$services[0]->main_title}}">
                    </div>
                    <div class="form-group">
                        <label for="">Button</label>
                        <input type="text" name="button" class="form-control w-50 m-auto"
                            value="{{$services[0]->button}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-teal">
                <h5 class="text-dark font-weight-bold">Toutes les infos des Services</h5>
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