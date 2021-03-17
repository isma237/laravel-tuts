<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $ticket = new Ticket();
        return view('dashboard.index',
            array(
                'tickets' => $ticket->getTicketByStatus(),
                'agents'   => User::all()
            )
        );
    }


    public function setAgentToTicket(Request $request){
        $ticket = Ticket::find($request->ticket_id);

        $ticket->user_id = $request->agent_id;
        $ticket->status = 'Started';
        $ticket->save();

        return back();
    }
}
