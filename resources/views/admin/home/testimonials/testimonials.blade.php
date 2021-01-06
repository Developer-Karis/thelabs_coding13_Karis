@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card shadow bg-white rounded card-warning">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Ajouter un Testimonial</h3>
            </div>
            <form action="/store-testimonial" method="post">
                @csrf
                <div class="text-center">
                    <div class="form-group">
                        <label for="">Paragraphe</label>
                        <textarea name="newPara" rows="6" class="form-control w-50 m-auto" style="resize: none;">
                            {{old('newPara')}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Full Name</label>
                        <input type="text" name="newFullName" class="form-control w-50 m-auto">
                    </div>
                    <div class="form-group">
                        <label for="">Function</label>
                        <input type="text" name="newFunction" class="form-control w-50 m-auto">
                    </div>
                    <label for="">Choisis l'Avatar</label>
                    <div class="form-group form-check">
                        @foreach ($testimonials->unique('avatar') as $item)
                        <input type="radio" name="radAnswer" value="{{$item->avatar}}" />
                        <img src="{{asset('img/'.$item->avatar)}}" alt="" class="mr-5 ml-2">
                        @endforeach
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-warning font-weight-bold">Créer</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow bg-white rounded card-warning">
            <div class="card-header mb-3">
                <h3 class="card-title font-weight-bold">Modifier le Titre Principal</h3>
            </div>
            <form action="/update-title-testimonial/{{$testimonials[0]->id}}" method="post">
                @csrf
                <div class="text-center">
                    <div class="form-group mt-3">
                        <label for="">Titre</label>
                        <input type="text" name="title" class="form-control w-50 m-auto"
                            value="{{$testimonials[0]->title}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-teal">
                <h5 class="text-dark font-weight-bold">Toutes les infos des Testimonials</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Avatar</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Function</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
                                <img src="{{asset('img/'.$item->avatar)}}" height="100" width="100" alt="">
                            </td>
                            <td>{{$item->fullName}}</td>
                            <td>{{$item->function}}</td>
                            <td>
                                <a href="/edit-testimonial/{{$item->id}}" class="btn btn-primary mr-2">Edit</a>
                                <a href="/delete-testimonial/{{$item->id}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop