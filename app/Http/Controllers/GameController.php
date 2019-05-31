<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use Illuminate\Support\Facades\Auth;
use App\Move;
use App\Events\GameCreated;
use App\Events\MoveCreated;

class GameController extends Controller
{

    public function index()
    {
        return redirect()->back();
    }

    public function insertMove(Request $request)
    {
        //dd('test');
        $fen = $request->fen;
        $id = $request->id;

        $move = new Move;
        $move->fen = $fen;
        $move->game_id = $id;
        $move->save();

        event(new MoveCreated($move));
    }

    public function store(Request $request)
    {
        $game = new Game;
        $game->white = 1;
        $game->black = 2;

        $game->save();

        $game = Game::latest()->first();

        event(new GameCreated($game));

        return redirect()->route('game.show', $game->id);
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('game')->withGame($game);
    }

}
