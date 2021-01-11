@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class="col-6">
        @if (session('success'))
        <div class="alert alert-success w-75">
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
        <div class="card shadow bg-white rounded card-warning w-75">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Ajouter une Catégorie</h3>
            </div>
            <form action="/store-categorie" method="post">
                @csrf
                <div class="text-center">
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="nom" class="form-control w-50 m-auto">
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
                <h5 class="text-dark font-weight-bold">Toutes les infos des Categories</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->nom}}</td>
                            <td>
                                <a href="/edit-categorie/{{$item->id}}" class="btn btn-primary mr-2">Edit</a>
                                <a href="/delete-categorie/{{$item->id}}" class="btn btn-danger">Delete</a>
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