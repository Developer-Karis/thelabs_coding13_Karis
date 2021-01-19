@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="card shadow mb-5 mt-3 bg-white rounded card-warning" style="width: 30%;">
    <div class="card-header">
        <h3 class="card-title font-weight-bold">Change Password</h3>
    </div>

    <div class="card-body text-center">
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control w-50 m-auto" name="password">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" class="form-control w-50 m-auto" name="confirmPassword">
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-warning font-weight-bold">Update</button>
    </div>
</div>
</div>
@stop