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
    <div class="mt-3 col-12">
        <div class="card shadow bg-white rounded card-warning w-50 m-auto">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Modifier le nom de la Catégorie</h3>
            </div>
            <form action="/update-categorie/{{$editCategorie->id}}" method="post">
                @csrf
                <div class="text-center">
                    <div class="form-group">
                        <label for="">Nom</label><br>
                        <input type="text" name="changeNom" class="form-control m-auto" style="width: 30%;"
                            value="{{$editCategorie->nom}}">
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