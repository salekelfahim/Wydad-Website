<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function Show()
    {
        return view('admin.addplayer');
    }

    public function AddPlayer(Request $request)
    {
        $picture = $request->file('picture')->store('images', 'public');

        Player::create([
            'firstname' => $request->input('firstname'),
            'lastname' => $request->input('lastname'),
            'birthday' => $request->input('birthday'),
            'nationality' => $request->input('nationality'),
            'number' => $request->input('number'),
            'position' => $request->input('position'),
            'picture' => $picture,
        ]);

        return back()->with('success', 'Player Added Successfully!');

    }
}
