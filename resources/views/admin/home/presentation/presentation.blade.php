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
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 50%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Change Presentation</h3>
        </div>

        <form action="/update-presentation" method="post">
            @csrf
            <div class="card-body text-center">
                <div class="form-group">
                    <label for="">Title</label>
                    <input type="text" class="form-control m-auto" name="title" value="{{$presentations[0]->title}}">
                </div>
                <div class="form-group">
                    <label for="">Paragraphe 1</label>
                    <textarea name="para1" rows="7" class="form-control" style="resize: none; text-align: left;">
                        {{$presentations[0]->para1}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Paragraphe 2</label>
                    <textarea name="para1" rows="7" class="form-control" style="resize: none;">
                        {{$presentations[0]->para2}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Button</label>
                    <input type="text" class="form-control m-auto w-50" name="buttonPresentation"
                        value="{{$presentations[0]->button}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop