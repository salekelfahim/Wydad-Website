<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\Product;
use App\Models\Reservation;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $product = Panier::sum('quantity');
        $tickets = Reservation::count('id');
        $products = Product::count('id');
        $Ntickets = Ticket::sum('nTickets');

        return view('admin.dashboard',compact('products', 'tickets', 'product', 'Ntickets'));
    }
}
