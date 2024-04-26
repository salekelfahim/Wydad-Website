<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Panier;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationsController extends Controller
{
    public function createReservation(Request $request)
    {
        $gameId = $request->input('game_id');
        $game = Game::find($gameId);
        $ticketId = $request->input('ticket');

        $checkReservation = Reservation::where('user_id', auth()->id())
            ->where('ticket_id', $ticketId)
            ->first();

        if ($checkReservation) {
            return redirect()->back()->with('error', 'You have already reserved this ticket.');
        }

        $ticket = Ticket::find($ticketId);

        if ($ticket->nTickets <= 0) {

            return redirect()->back()->with('error', 'This Ticket is sold out.');
        }

        $reservation = new Reservation([
            'ticket_id' => $ticketId,
            'user_id' => auth()->id(),
        ]);

        if ($reservation != NULL) {


            DB::table('tickets')->where('id', $request->input('ticket'))->decrement('nTickets');

            $reservation->save();

            return redirect()->back()->with('success', 'Ticket Reserved successfully! You can check it Now in Reservations Page');
        } else {

            return redirect()->back()->with('error', 'Ticket Reservation Error!');
        }
    }

    public function MyReservations($id)
    {
        $products = Panier::where('user_id', $id)->get();

        $tickets = Reservation::where('user_id', $id)->get();

        return view('myreservations', compact('products', 'tickets'));
    }
}
