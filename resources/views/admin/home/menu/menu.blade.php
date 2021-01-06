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
            <h3 class="card-title font-weight-bold">Change name Links</h3>
        </div>

        <form action="/update-links/{{$navbars[0]->id}}" method="post">
            @csrf
            <div class="card-body text-center">
                <div class="form-group">
                    <label for="">Link 1</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="link1"
                        value="{{$navbars[0]->link1}}">
                </div>
                <div class="form-group">
                    <label for="">Link 2</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="link2"
                        value="{{$navbars[0]->link2}}">
                </div>
                <div class="form-group">
                    <label for="">Link 3</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="link3"
                        value="{{$navbars[0]->link3}}">
                </div>
                <div class="form-group">
                    <label for="">Link 4</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="link4"
                        value="{{$navbars[0]->link4}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop