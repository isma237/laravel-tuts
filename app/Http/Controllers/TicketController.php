<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(){

        return view('ticket.user_tickets',[
            'tickets' => Auth::user()->tickets
        ]);
    }


    public function create(){

    }
}

