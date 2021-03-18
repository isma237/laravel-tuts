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

    <div class="row">
        <div class="col-12 mt-2">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Role(s)</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>-</td>
                            <td><a href="{{url('/admin/user/' .$user->id)}}">Voir plus</a> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
