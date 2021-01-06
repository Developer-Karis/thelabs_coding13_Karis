@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning text-center w-50 m-auto">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Change Link Video</h3>
        </div>
        <form action="/update-video/{{$videos[0]->id}}" method="post">
            @csrf
            <div class="card-body text-center">
                <div class="form-group">
                    <label for="">Changer le lien</label><br>
                    <input type="text" name="linkVideo" value="{{$videos[0]->video}}" class="w-100">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop