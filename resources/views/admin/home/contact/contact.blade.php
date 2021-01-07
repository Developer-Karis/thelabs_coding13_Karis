@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success m-auto">
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
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Change infos Contact</h3>
        </div>

        <form action="/update-contacts/{{$contacts[0]->id}}" method="post">
            @csrf
            <div class="card-body text-center">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control m-auto" style="width: 65%;" name="title"
                                value="{{$contacts[0]->title}}">
                        </div>
                        <div class="form-group">
                            <label for="">Para</label>
                            <textarea name="para" rows="4" class="form-control m-auto"
                                style="resize: none; width: 65%;">
                                {{$contacts[0]->para}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Mini Titre</label>
                            <input type="text" class="form-control m-auto" style="width: 65%;" name="mini_title"
                                value="{{$contacts[0]->mini_title}}">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" class="form-control m-auto" style="width: 65%;" name="address"
                                value="{{$contacts[0]->address}}">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="">Post Code</label>
                            <input type="text" class="form-control m-auto" style="width: 65%;" name="postcode"
                                value="{{$contacts[0]->postcode}}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control m-auto" style="width: 65%;" name="phone_number"
                                value="{{$contacts[0]->phone_number}}">
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" class="form-control m-auto" style="width: 65%;" name="website"
                                value="{{$contacts[0]->website}}">
                        </div>
                        <div class="form-group">
                            <label for="">Button Form</label>
                            <input type="text" class="form-control m-auto" style="width: 65%;" name="buttonForm"
                                value="{{$contacts[0]->buttonForm}}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop