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
    @if ($errors->any())
    <div class="alert alert-danger w-50 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 50%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Change Banner Header Contact</h3>
        </div>

        <form action="/update-bannerHeader-contact/{{$bannerHeader[2]->id}}" method="post">
            @csrf
            <div class="card-body text-center">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control w-50 m-auto" name="title"
                        value="{{$bannerHeader[2]->title}}">
                </div>
                </select>
                <div class="form-group">
                    <label for="">Lien Précédent</label>
                    <input type="text" name="lienPrecedent" class="form-control w-50 m-auto"
                        value="{{$bannerHeader[2]->lienPrecedent}}">
                </div>
                <div class="form-group">
                    <label for="">Lien Actuel</label>
                    <input type="text" name="lienActuel" class="form-control w-50 m-auto"
                        value="{{$bannerHeader[2]->lienActuel}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop