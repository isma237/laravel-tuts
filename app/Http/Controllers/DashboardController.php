<?php
namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    }

    public function statistique(){
        $tickets = Ticket::all();
        $result = [];
        foreach ($tickets as $ticket){
            if(array_key_exists(substr($ticket->created_at, 0, 10), $result)){
                $result[substr($ticket->created_at, 0, 10)] = $result[substr($ticket->created_at, 0, 10)] +1;
            }else{
                $result[substr($ticket->created_at, 0, 10)] = 1;
            }
        }

        $data = [];
        $label = [];
        foreach ($result as $key => $res){
            $label[] = $key;
            $data[] = $res;
        }

        return view('dashboard.stat', [
            'label' => $label,
            'data'  => $data
        ]);


    }
}
