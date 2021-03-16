@extends('master');
@section('title', 'Accueil')

@section('content')
    <h1>Bienvenue sur votre application de reclammation</h1>

    <div class="row">
        <form method="POST" action="{{url('/')}}">
            @csrf

            <div class="mb-2">
                <label for="description" class="form-label">Décrivez votre problème ci-dessous</label>
                <textarea class="form-control" id="description" rows="4" name="description"></textarea>
            </div>
            <button type="submit" class="btn btn-sm btn-success">Enregistrer</button>
        </form>
    </div>
@endsection
