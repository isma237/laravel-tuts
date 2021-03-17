@extends('master')
@section('title', 'Tableau de bord')
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <h1>Liste des tickets en attente de traitement</h1>
        </div>
    </div>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <td>Id</td>
            <td>Description</td>
            <td>Date de création</td>
            <td>Statut</td>
            <td>Agent ID</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td class="ticket-id">{{ $ticket->id }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->status }}</td>
                    <td>{{ $ticket->user_id }}</td>
                    <td>
                        <form class="row gy-2 gx-3 align-items-center" method="POST" action="{{url('/dashboard/set-agent')}}">
                            @csrf
                            <div class="col-auto">
                                <input type="number" name="ticket_id"
                                       value="{{$ticket->id}}" hidden>
                            </div>
                            <div class="col-auto">
                                <select class="form-select" aria-label="Default select example"
                                        name="agent_id">
                                    <option selected>Open this select menu</option>
                                    @foreach($agents as $agent)
                                        <option value="{{$agent->id}}">{{$agent->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-sm btn-primary">Enregistrer</button>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
