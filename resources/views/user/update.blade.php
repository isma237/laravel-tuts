@extends('master');
@section('title', 'Mise à jour du profil utilisateur ')
@section('content')

    <div class="row">
        <h1>Profil de l'utilisateur</h1>
        <div class="col-12">
            <table class="table table-responsive">
                <tr>
                    <td>Nom</td>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <td>Roles</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <div class="col-12 mt-5">
            <h3>Définir le ou les rôles de l'utilisateur</h3>
            <form method="POST" action="{{url('admin/user/' . $user->id )}}">
                @method('PUT')
                @csrf
                <select class="form-control" name="roles[]" multiple>
                    @foreach($roles as $role)
                        <option value="{{$role->id}}"
                            >{{ $role->name }} : {{ $role->description }}
                        </option>
                    @endforeach
                </select>

                <button class="btn btn-primary btn-sm mt-2" type="submit">Enregistrer</button>
            </form>
        </div>
    </div>
@endsection
