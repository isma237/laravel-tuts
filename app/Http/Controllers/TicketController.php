<?php

namespace App\Http\Controllers;


use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class TicketController extends Controller
{
    public function index(Request $request){
        $user = Auth::user();
        return view('ticket.user_tickets', [
            'tickets' => $user->tickets
        ]);
    }
    public function store($ticket_id, $statut){

        $ticket = Ticket::find($ticket_id);
        if(Auth::id() == $ticket->user_id){
            $ticket->status = $statut;
            $ticket->updated_at = now();
            $ticket->update();
            return back()->with("message", "Ticket mis à jour avec succès");
        }
        return back()->with("message", "Vous ne pouvez pas modifier ce ticket");

    }


    public function test(Request $request){
        $ticketId = $request->query->get('ticket_id');
        $statut = $request->query->get('statut');
        $ticket = Ticket::find($ticketId);

        $ticket->status = $statut;
        $ticket->updated_at = now();
        $ticket->update();
        return back()->with("message", "Ticket mis à jour avec succès");
    }
}

