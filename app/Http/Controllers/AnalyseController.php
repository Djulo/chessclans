<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Move;
use Illuminate\Support\Facades\DB;
use App\Game;
use App\User;
class AnalyseController extends Controller
{

    public function index()
    {
        $this->middleware('auth');
        $games = DB::table('games')->get();
        $games = $games->map(function ($game) {
            $white = User::findOrFail($game->white);
            $black = User::findOrFail($game->black);
            return ['game' => $game,
                'white' => $white,
                'black' => $black];
        });
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

        // $moves->toJson();
        return view('analyse-game', ['game' => $game,
            'moves' => $moves->implode(',')]);
    }
    public function ranking()
    {
        $users = DB::table('users')->get()->sortByDesc('CCpoints');

        return view('ranking',['users'=>$users]);
    }

   
}
