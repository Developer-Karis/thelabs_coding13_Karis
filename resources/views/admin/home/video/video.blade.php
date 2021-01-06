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
    <div class="mt-3">
        <div class="card shadow bg-white rounded card-warning w-50 m-auto">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Change Link Video</h3>
            </div>
            <form action="/update-video/{{$videos[0]->id}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group text-center">
                        <label for="">Changer le lien Youtube</label><br>
                        <input type="text" name="linkVideo" value="{{$videos[0]->video}}" class="w-100">
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