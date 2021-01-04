@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<div class="mt-5">
    <h1 class="py-3 bg-dark w-25 m-auto text-center shadow mb-5 rounded">Links</h1>
</div>
@stop

@section('content')
<div class="container">
    <div class="card shadow mb-5 mt-5 bg-white rounded card-teal" style="width: 50%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title">Change name Links</h3>
        </div>

        <form action="/update-links" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body text-center">
                @foreach ($navbars as $item)
                <div class="form-group">
                    <label for="">Link 1</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="links1"
                        value="{{$item->link1}}">
                </div>
                <div class="form-group">
                    <label for="">Link 2</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="links2"
                        value="{{$item->link2}}">
                </div>
                <div class="form-group">
                    <label for="">Link 3</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="links3"
                        value="{{$item->link3}}">
                </div>
                <div class="form-group">
                    <label for="">Link 4</label>
                    <input type="text" class="form-control m-auto" style="width: max-content;" name="links4"
                        value="{{$item->link4}}">
                </div>
                @endforeach
            </div>
            <div class="card-footer card-teal">
                <button type="submit" class="btn bg-teal">Update</button>
            </div>
        </form>
    </div>
</div>
@stop