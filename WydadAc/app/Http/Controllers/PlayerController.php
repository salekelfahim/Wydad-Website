<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function Show()
    {
        return view('admin.addplayer');
    }

    public function AddPlayer(PlayerRequest $request)
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

    public function getPlayers()
    {
        $players = Player::all();

        return view('admin.playerslist', compact('players'));
    }

    public function update(PlayerRequest $request, $id)
    {

        $player = Player::find($id);

        if (!$player) {
            return redirect()->back()->with('error', 'Player not found.');
        }

        $player->firstname = $request->firstname;
        $player->lastname = $request->lastname;
        $player->birthday = $request->birthday;
        $player->nationality = $request->nationality;
        $player->number = $request->number;
        $player->position = $request->position;

        if ($request->hasFile('picture')) {
            $player->picture = $request->file('picture')->store('images', 'public');
        }

        $player->save();

        return redirect()->back()->with('success', 'Player updated successfully.');
    }
}
