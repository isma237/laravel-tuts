@extends('master')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('error_login'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{\Illuminate\Support\Facades\Session::get('error_login')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="row">
        <div class="col-12 mt-3">
            <form method="POST" action="{{url('signin/login')}}">
                @csrf
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Mot de passe</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </div>
@endsection

