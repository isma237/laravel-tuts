<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $tickets = array();
        $tickets[] = 'Compte Orange Money indisponible';
        $tickets[] = 'Ma SIM est bloquée';
        $tickets[] = 'Je souhaite identifier ma SIM';

        $holdTicket = true;

        $tableau = array(
            'tickets' => $tickets,
            'condition' => $holdTicket
        );
        $tableau['tickets'];


        return view('home.index', array(
            'tickets' => $tickets,
            'condition' => $holdTicket
        ));
    }


    public function store(Request $request){
        $description = $request->description;
        $userId = 2;

        $ticket = new Ticket();
        $ticket->user_id = $userId;
        $ticket->description = $description;
        $ticket->status = 'Created';
        $ticket->started_at = Carbon::now();
        $ticket->save();


        return view('home.index');

    }
}
