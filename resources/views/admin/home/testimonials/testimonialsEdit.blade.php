@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="container">
    <div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 75%; margin: auto;">
        <div class="card-header">
            <h3 class="card-title font-weight-bold">Changer le Testimonial</h3>
        </div>

        <form action="/update-testimonial/{{$editTestimonial->id}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="text-center mt-3">
                <div class="form-group">
                    <label for="">Paragraphe</label>
                    <textarea name="para" rows="6" class="form-control w-50 m-auto" style="resize: none;">
                        {{$editTestimonial->para}}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="">Full Name</label>
                    <input type="text" name="fullName" class="form-control w-50 m-auto"
                        value="{{$editTestimonial->fullName}}">
                </div>
                <div class="form-group">
                    <label for="">Function</label>
                    <input type="text" name="function" class="form-control w-50 m-auto"
                        value="{{$editTestimonial->function}}">
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
                <button type="submit" class="btn bg-warning font-weight-bold">Update</button>
            </div>
        </form>
    </div>
</div>
@stop