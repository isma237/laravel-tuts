@extends('master')
@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            <h1>Liste des tickets en attente de traitement</h1>
        </div>
    </div>

    {{url('/update-ticket?ticket_id=2&agent_id=3')}}
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <td>Id</td>
                <td>Description</td>
                <td>Date de création</td>
                <td>Statut</td>
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
                    <form action="{{route('update-ticket', ['ticket_id'=>$ticket->id, 'statut'=>"Terminated"])}}" method="POST">
                        @csrf

                        <td class="text-center">
                            @if($ticket->status =="Started")
                            <button class="btn btn-sm btn-success" type="submit" >Cloturé</button>
                        @endif
                    </form>
                    <form action="{{route('update-ticket', ['ticket_id'=>$ticket->id, 'statut'=>'Canceled'])}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-danger">Annuler</button>
                    </form>
                </td>



                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

