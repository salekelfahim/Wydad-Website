<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Models\Player;
use App\Models\Position;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Player::paginate(12);

        return view('players', compact('players'));
    }

    public function Show()
    {
        $positions = Position::all();

        return view('admin.addplayer', compact('positions'));
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
            'position_id' => $request->input('position'),
            'picture' => $picture,
        ]);

        return back()->with('success', 'Player Added Successfully!');
    }

    public function getPlayers()
    {
        $players = Player::all();
        $positions = Position::all();

        return view('admin.playerslist', compact('players', 'positions'));
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
        $player->position_id = $request->position;

        if ($request->hasFile('picture')) {
            $player->picture = $request->file('picture')->store('images', 'public');
        }

        $player->save();

        return redirect()->back()->with('success', 'Player updated successfully.');
    }

    public function delete($id)
    {
        $player = Player::findOrfail($id);

        if (!$player) {
            
            return redirect()->back()->with('error', 'Player not found.');
        }

        $player->delete();

        return redirect()->back()->with('success', 'Player deleted successfully.');
    }

    public function searchPlayers(Request $request)
    {
        $keyword = $request->input('title_s');
        if ($keyword === '') {
            $players = Player::get();
        } else {

            $players = Player::where('firstname', 'like', '%' . $keyword . '%')
                ->orWhere('lastname', 'like', '%' . $keyword . '%')
                ->get();
        }

        return view('search')->with(['players' => $players, 'keyword' => $keyword]);
    }
}
