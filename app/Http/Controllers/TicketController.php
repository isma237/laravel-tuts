<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(){
        if(!Auth::user())
        {
            abort(404);
        }
        else{
            return view('ticket.user_tickets', [
                'tickets' => Auth::user()->tickets
            ]);
        }
    }
}

