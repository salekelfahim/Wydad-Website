<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function getAllGames()
    {
        $games = Game::all();

        return view('admin.allgames', compact('games'));
    }

    public function addGame(Request $request)
    {

        $game = Game::create([
            'date' => $request->input('date'),
            'opponent' => $request->input('opponent'),
            'compitition' => $request->input('compitition'),
            'status' => $request->input('status'),
            'stadium' => $request->input('stadium'),
        ]);

        if (!$game) {
            return back()->with('error', 'Error in Adding Game!');
        }

        return back()->with('success', 'Game Added Successfully!');
    }

    public function update(Request $request, $id)
    {

        $game = Game::find($id);

        if (!$game) {
            return redirect()->back()->with('error', 'Game not found.');
        }

        $game->date = $request->date;
        $game->opponent = $request->opponent;
        $game->compitition = $request->compitition;
        $game->status = $request->status;
        $game->stadium = $request->stadium;

        $game->save();

        return redirect()->back()->with('success', 'Game updated successfully.');
    }

    public function delete($id)
    {
        $game = Game::findOrfail($id);

        if (!$game) {
            return redirect()->back()->with('error', 'Game not found.');
        }

        $game->delete();

        return redirect()->back()->with('success', 'Game deleted successfully.');
    }
}
