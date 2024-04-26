<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $ticket = Ticket::where('id',$id)->first();
       
        $data = 
            [
                'title' => $ticket->game->opponent,
                'price' => $ticket->price,
                'category' => $ticket->category->category,
                'date' => $ticket->game->date,
            ];

        $pdf = PDF::loadView('myticket', $data);
        return $pdf->download('WydadTicket.pdf');
    }
}
