@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    @if (session('success'))
    <div class="alert w-100 alert-success">
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
    <div class="mt-3 col-12">
        <div class="card shadow bg-white rounded card-warning">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Ajouter un Article</h3>
            </div>
            <form action="/store-article" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row text-center">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Ajouter une Image</label><br>
                            <input type="file" name="newImageArticle">
                        </div>
                        <div class="form-group">
                            <label for="">Choisir une ou plusieurs Catégories</label>
                            <select multiple="" class="form-control w-50 m-auto" name="cats[]">
                                @foreach ($categories as $item)
                                <option value="{{$item->id}}"
                                    {{ in_array($item->id, old('cats') ?: []) ? 'selected' : '' }}>{{$item->nom}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Choisir un ou plusieurs Tags</label>
                            <select multiple="" class="form-control w-50 m-auto" name="tags[]">
                                @foreach ($tags as $item)
                                <option value="{{$item->id}}"
                                    {{ in_array($item->id, old('tags') ?: []) ? 'selected' : '' }}>{{$item->nom}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Titre</label>
                            <input type="text" name="newTitre" class="form-control m-auto" style="width: 60%;">
                        </div>
                        <div class="form-group">
                            <label for="">Auteur</label>
                            <input type="text" name="newAuteur" class="form-control m-auto" style="width: 40%;">
                        </div>
                        <div class="form-group">
                            <label for="">Fonction</label>
                            <input type="text" name="newFonction" class="form-control m-auto" style="width: 40%;">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="newDescription" rows="6" class="form-control m-auto"
                                style="width: 60%; resize: none;"></textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Photo Profil</label><br>
                            <input type="file" name="newPhotoProfil">
                        </div>
                        <div class="form-group">
                            <label for="">Texte</label>
                            <textarea name="newTexte" rows="12" class="form-control m-auto"
                                style="width: 60%; resize: none;"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Texte Auteur</label>
                            <textarea name="newTexteAuteur" rows="4" class="form-control m-auto"
                                style="width: 60%; resize: none;"></textarea>
                        </div>
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
                <h5 class="text-dark font-weight-bold">Toutes les infos des Articles</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $item)
                        @if ($item->confirmer == true)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
                                <img src="{{asset('img/blog/'.$item->image)}}" height="150" width="280" alt="">
                            </td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->titre}}</td>
                            <td>{{$item->auteur}}</td>
                            <td>
                                <a href="/edit-article/{{$item->id}}" class="btn btn-primary mr-2">Edit</a>
                                <a href="/delete-article/{{$item->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop