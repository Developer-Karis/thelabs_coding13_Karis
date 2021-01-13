@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-teal">
                <h5 class="text-dark font-weight-bold">Tous les Articles en Attente</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Date</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $item)
                        @if ($item->confirmer == false)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
                                <img src="{{asset('img/blog/'.$item->image)}}" height="150" width="280" alt="">
                            </td>
                            <td>{{$item->date}}</td>
                            <td>{{$item->titre}}</td>
                            <td>{{$item->auteur}}</td>
                            <td>
                                <a href="/accepter-article/{{$item->id}}" class="btn btn-primary mr-2">Accepter</a>
                                <a href="/delete-article/{{$item->id}}" class="btn btn-danger">Refuser</a>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop