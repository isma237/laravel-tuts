<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $ticket = new Ticket();

        return view('dashboard.index',
            array('tickets' => $ticket->getTicketByStatus())
        );
    }
}
