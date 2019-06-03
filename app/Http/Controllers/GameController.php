<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use Illuminate\Support\Facades\Auth;
use App\Move;
use App\Events\GameCreated;
use App\Events\MoveCreated;
use App\Events\JoinedSuccessfully;

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
        $vals=$request->route()->parameters();

        $game = Game::where('black',null)->first();
        //dd($game);
        if($game == null){
            $game = new Game;
            $game->white = Auth::user()->id;
            $game->black = null;
            $game->save();

            $game = Game::latest()->first();
            event(new GameCreated($game));

        }
        else{
            if(Auth::user()->id == $game->white) $this->show($game->id)->with('vals', $vals);
            $game->black = Auth::user()->id;
            $game->save();

            $game = Game::find($game->id);
            // dd($game);
            event(new JoinedSuccessfully($game));
        }


        return redirect()->route('game.show', $game->id)->with('vals', $vals);
    }

    public function show($id)
    {
        $vals = session('vals');
        $game = Game::findOrFail($id);
        return view('game', ['game' => $game,
        'vals' => $vals]);
    }

}
