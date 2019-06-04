<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Move;
use Illuminate\Support\Facades\DB;
use App\Game;
class AnalyseController extends Controller
{

    public function index()
    {
        $games = DB::table('games')->get();

        return view('analyse',['games'=>$games]);
    }

    public function nextMove(Request $request)
    {
        $id = $request->id;
        $fen = DB::table('moves')->where('id', $id)->pluck('fen');

        return $fen;
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $game = Game::findOrFail($id);
        $moves = DB::table('moves')->where('game_id', $id)->get();

        $moves = $moves->map(function($move) {
            return $move->fen;
        });

        $white = User::findOrFail($game->white);
        $black = User::findOrFail($game->black);
        // $moves->toJson();
        return view('analyse-game', ['game' => $game,
            'moves' => $moves->implode(','),
            'white' => $white,
            'black' => $black]);
    }
}
