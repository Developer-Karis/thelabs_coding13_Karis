@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-5 mt-3 bg-white rounded card-warning">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Profil</h3>
            </div>

            <div class="card-body text-center">
                <div class="form-group">
                    <h3>Photo de Profil</h3>
                    <img src="{{asset('img/avatar/'. Auth::user()->photo)}}" alt="" height="150">
                </div>
                <div class="form-group">
                    <h3>Role</h3>
                    <h6>{{Auth::user()->role->role}}</h6>
                </div>
                <div class="form-group">
                    <h3>Nom</h3>
                    <h6>{{Auth::user()->name}}</h6>
                </div>
                <div class="form-group">
                    <h3>Email</h3>
                    <h6>{{Auth::user()->email}}</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card shadow mb-5 mt-3 bg-white rounded card-warning">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Change Profil</h3>
            </div>

            <form action="/update-profil/{{Auth::user()->id}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body text-center">
                    <div class="form-group">
                        <label for="">Photo de Profil</label><br>
                        <input type="file" name="changePhoto" value="">
                    </div>
                    </select>
                    <div class="form-group">
                        <label for="">Nom</label>
                        <input type="text" name="changeNom" class="form-control m-auto" style="width: 35%;"
                            value="{{Auth::user()->name}}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="changeEmail" class="form-control m-auto" style="width: 35%;"
                            value="{{Auth::user()->email}}">
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