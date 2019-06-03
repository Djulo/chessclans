<?php

namespace App\Http\Controllers;

use App\Events\JoinedSuccessfully;
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

    public function store(Request $request)
    {
        $vals = $request->route()->parameters()['value'];

        $game = Game::where('black', null)->where('format', $vals)->first();
        //dd($game);
        if ($game == null) {
            $game = new Game;
            $game->white = Auth::user()->id;
            $game->black = null;
            $game->format = $vals;
            $game->save();

            $game = Game::latest()->first();
            event(new GameCreated($game));
<<<<<<< HEAD
        } else {
            if (Auth::user()->id == $game->white) return redirect()->route('game.show', $game->id);
=======
            $initalMove = new Move;
            $initalMove->game_id = $game->id;
            $initalMove->fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
            $initalMove->save();

        }
        else{
            if(Auth::user()->id == $game->white) return redirect()->route('game.show', $game->id);
>>>>>>> 9ac50f78a1b702b11551bb943fa2f2cc214f58e3
            $game->black = Auth::user()->id;
            $game->save();

            $game = Game::find($game->id);
            // dd($game);
            event(new JoinedSuccessfully($game));
        }

        event(new GameCreated($game));

        return redirect()->route('game.show', $game->id);
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('game', [
            'game' => $game,
            'vals' => $game->format
        ]);
    }

<<<<<<< HEAD
    public function gameEnd(Request $request)
    {
        dd($request->winner);
    }
=======
    public function turn(Request $request)
    {
        $game = Game::findOrFail($request->id);
        $id = (Auth::user()->id === $game->white) ? 'w' : 'b';

        return response()->json($id);
    }

    public function state(Request $request)
    {
        $fen = Move::where('game_id', $request->id)->latest()->first()->fen;
        return response()->json($fen);
    }

>>>>>>> 9ac50f78a1b702b11551bb943fa2f2cc214f58e3
}
