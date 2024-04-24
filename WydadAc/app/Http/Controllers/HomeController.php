<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Player;
use App\Models\Product;
use App\Models\Staff;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(3);
        $players = Player::paginate(3);
        $staffs = Staff::paginate(3);
        $newss = News::orderBy('created_at', 'desc')->paginate(3);

        return view('accueil', compact('products', 'players', 'staffs', 'newss'));
    }
}
