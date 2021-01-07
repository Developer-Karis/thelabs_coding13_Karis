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
            <h3 class="card-title font-weight-bold">Change Footer</h3>
        </div>

        <form action="/update-footer/{{$footers[0]->id}}" method="post">
            @csrf
            <div class="card-body text-center">
                <div class="form-group">
                    <label for="">Para</label>
                    <input type="text" class="form-control m-auto" style="width: 60%;" name="para"
                        value="{{$footers[0]->para}}">
                </div>
                <div class="form-group">
                    <label for="">Author</label>
                    <input type="text" class="form-control m-auto" style="width: 60%;" name="author"
                        value="{{$footers[0]->author}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop