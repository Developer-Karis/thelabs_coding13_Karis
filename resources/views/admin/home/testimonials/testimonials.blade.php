@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    @if(Session::has('success'))
    <div class="alert alert-success w-50 m-auto">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <strong>Modification effectuée avec Succès !</strong> {{ Session::get('message', '') }}
    </div>
    @endif
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove(); 
            });
        }, 1000);
    </script>
    <div class="mt-3">
        <div class="card shadow bg-white rounded card-warning w-50 m-auto">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Change Testimonial</h3>
            </div>
            <div class="form-group">
                
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </div>
    </div>
</div>
@stop