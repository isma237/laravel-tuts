@extends('master');
@section('title', 'Utilisateurs')
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <h1>Formulaire de création des utilisateurs</h1>
        </div>

        <div class="col-12">
            <form method="POST" action="{{url('/admin/user')}}">
                @csrf
                <div class="mb-2">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name"/>
                </div>
                <div class="mb-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"/>
                </div>

                <div class="mb-2">
                    <button type="submit" class="btn btn-md btn-success">Enregistrer</button>
                </div>
            </form>
        </div>
    </div>
@endsection
