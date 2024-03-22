<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function Show()
    {
        return view('admin.addplayer');
    }
}
