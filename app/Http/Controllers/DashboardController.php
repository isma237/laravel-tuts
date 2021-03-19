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
        //$results = DB::sel("select SUBSTRING(`created_at`, 1, 11) as Jour, count(id) as Tickets from tickets GROUP BY SUBSTRING(`created_at`, 1, 11)")->get();
        //dd($results);

        $tickets = DB::table('tickets')
            ->groupBy(substr('created_at', 0, 10))
            ->select(DB::raw('created_at, count(*) as tickets'))
            ->get();

        dd($tickets);

        $tickets = DB::table('tickets')
            ->select('count(*) as tickets, created_at')
            ->groupBy(substr('created_at', 0, 10))
            ->get();

        dd($tickets);

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
