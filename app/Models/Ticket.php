<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public function getTicketByStatus($name = 'Created'){
        return Ticket::where('status', $name)->get();
    }
}
