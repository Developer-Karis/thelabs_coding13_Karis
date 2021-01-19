@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content')
<div class="row">
    <div class="col-6">
        <div class="card shadow mb-5 mt-3 bg-white rounded card-warning">
            <div class="card-header">
                <h3 class="card-title font-weight-bold">Résumé du Mail du Formulaire de Contact</h3>
            </div>

            @if ($formulaireContact->count() == 0)
            <div class="card-body text-center">
                <h5 class="font-weight-bold">Pas de Mail encore envoyé !</h5>
            </div>
            @else
            <div class="card-body text-center">
                @foreach ($formulaireContact as $item)
                <div class="form-group">
                    <h3 class="font-weight-bold">Nom</h3>
                    <h6>{{$item->name}}</h6>
                </div>
                <div class="form-group">
                    <h3 class="font-weight-bold">Email</h3>
                    <h6>{{$item->email}}</h6>
                </div>
                <div class="form-group">
                    <h3 class="font-weight-bold">Subject</h3>
                    <h6>{{$item->subject}}</h6>
                </div>
                <div class="form-group">
                    <h3 class="font-weight-bold">Message</h3>
                    <h6>{{$item->message}}</h6>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
@stop