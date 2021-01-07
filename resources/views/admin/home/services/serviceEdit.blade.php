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
            <h3 class="card-title font-weight-bold">Changer le Service</h3>
        </div>

        <form action="/update-service/{{$editService->id}}" method="post">
            @csrf
            <div class="form-group text-center mt-3">
                <label for="">Changer l'Icône</label><br>
                <select name="changeService" class="form-control m-auto" style="width: 35%;">
                    @foreach ($services->unique('icon') as $item)
                    <option value="{{$item->icon}}">{{$item->icon}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group text-center">
                <label for="">Titre</label>
                <input type="text" name="changeTitle" class="form-control m-auto" style="width: 35%;"
                    value="{{$editService->title}}">
            </div>
            <div class="form-group text-center">
                <label for="">Para</label>
                <textarea name="changePara" rows="6" class="form-control m-auto" style="resize: none; width: 35%;">
                    {{$editService->para}}
                </textarea>
            </div>
            <div class="card-footer">
                <button type="submit" class="font-weight-bold btn bg-warning">Update</button>
            </div>
        </form>
    </div>
</div>
@stop