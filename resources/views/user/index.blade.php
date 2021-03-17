@extends('master');
@section('title', 'Utilisateurs')
@section('content')
    <div class="row">
        <div class="col-6 mt-3">
            <h3>Liste des utilisateurs</h3>
        </div>
        <div class="col-6 mt-3 text-end">
            <a href="{{url('/admin/user/create')}}">Ajouter un utilisateur</a>
        </div>
    </div>
@endsection
