<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function createTickets(TicketRequest $request)
    {

        $checkTicket = Ticket::where('category_id', $request->input('category'))
            ->where('game_id', $request->input('game_id'))
            ->first();

        if ($checkTicket) {
            
            return redirect()->back()->with('error', 'Ticket already exists for this game and category!');
        }

        $ticket = new Ticket([
            'nTickets' => $request->input('nTickets'),
            'price' => $request->input('price'),
            'game_id' => $request->input('game_id'),
            'category_id' => $request->input('category'),
        ]);

        $ticket->save();
        if ($ticket != NULL) {
            return redirect()->back()->with('success', 'Tickets added successfully! You can Add Another Tickets category');
        } else {

            return redirect()->back()->withErrors(['message' => 'Error']);
        }
    }
}
