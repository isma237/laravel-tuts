@extends('master')
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
            </tr>
        </thead>
        <tbody>
            @foreach($tickets as $ticket)
                <tr>
                    <td class="ticket-id">{{ $ticket->id }}</td>
                    <td>{{ $ticket->description }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

