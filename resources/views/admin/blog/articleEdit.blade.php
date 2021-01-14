@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    @if (session('success'))
    <div class="alert alert-success w-50 m-auto">
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
    <div class="col-12">
        <div class="card shadow bg-white rounded card-warning">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Modifier un Article</h3>
            </div>
            <form action="/update-article/{{$editArticle->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row text-center">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Image de l'Article</label><br>
                            <input type="file" name="changeImageArticle">
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
                            <input type="text" name="changeTitre" class="form-control m-auto" style="width: 60%;"
                                value="{{$editArticle->titre}}">
                        </div>
                        <div class="form-group">
                            <label for="">Auteur</label>
                            <input type="text" name="changeAuteur" class="form-control m-auto" style="width: 40%;"
                                value="{{$editArticle->auteur}}">
                        </div>
                        <div class="form-group">
                            <label for="">Fonction</label>
                            <input type="text" name="changeFonction" class="form-control m-auto" style="width: 40%;"
                                value="{{$editArticle->fonction}}">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="changeDescription" rows="6" class="form-control m-auto"
                                style="width: 60%; resize: none;">{{$editArticle->description}}</textarea>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Photo Profil</label><br>
                            <input type="file" name="changePhotoProfil">
                        </div>
                        <div class="form-group">
                            <label for="">Texte</label>
                            <textarea name="changeTexte" rows="12" class="form-control m-auto"
                                style="width: 60%; resize: none;">{{$editArticle->texte}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Texte Auteur</label>
                            <textarea name="changeTexteAuteur" rows="4" class="form-control m-auto"
                                style="width: 60%; resize: none;">{{$editArticle->texte_auteur}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop