@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success m-auto" style="width: 70%;">
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
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 70%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Changer la Team</h3>
        </div>

        <form action="/update-team/{{$editTeam->id}}" method="post">
            @csrf
            <div class="form-group text-center mt-3">
                <label for="">Changer l'image de la Team</label><br>
                <div class="form-group form-check">
                    @foreach ($teams->unique('imageTeam') as $item)
                    <input type="radio" name="radAnswer" value="{{$item->imageTeam}}" />
                    <img src="{{asset('img/team/'.$item->imageTeam)}}" alt="" height="150" class="mr-5 ml-2">
                    @endforeach
                </div>
            </div>
            <div class="form-group text-center">
                <label for="">Full Name</label>
                <input type="text" name="changeFullName" class="form-control m-auto" style="width: 35%;"
                    value="{{$editTeam->fullName}}">
            </div>
            <div class="form-group text-center">
                <label for="">Function</label>
                <input type="text" name="changeFunction" class="form-control m-auto" style="width: 35%;"
                    value="{{$editTeam->function}}">
            </div>
            <div class="card-footer">
                <button type="submit" class="font-weight-bold btn bg-warning">Update</button>
            </div>
        </form>
    </div>
</div>
@stop