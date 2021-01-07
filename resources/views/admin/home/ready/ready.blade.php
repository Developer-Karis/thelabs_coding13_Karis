@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
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
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 50%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Change Data Ready?</h3>
        </div>

        <form action="/update-ready/{{$readys[0]->id}}" method="post">
            @csrf
            <div class="card-body text-center">
                <div class="form-group">
                    <label for="">Titre</label>
                    <input type="text" class="form-control m-auto" style="width: 50%;" name="title"
                        value="{{$readys[0]->title}}">
                </div>
                <div class="form-group">
                    <label for="">Sous-Titre</label>
                    <input type="text" class="form-control m-auto" style="width: 100%;" name="sous_title"
                        value="{{$readys[0]->sous_title}}">
                </div>
                <div class="form-group">
                    <label for="">Button</label>
                    <input type="text" class="form-control m-auto" style="width: 50%;" name="button"
                        value="{{$readys[0]->button}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop