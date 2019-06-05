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
            $initalMove = new Move;
            $initalMove->game_id = $game->id;
            $initalMove->fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
            $initalMove->save();
            broadcast(new GameCreated($game));
        } else {
            if (Auth::user()->id == $game->white) return redirect()->route('game.show', $game->id);
            $game->black = Auth::user()->id;
            $game->save();

            $game = Game::find($game->id);
            // dd($game);
            broadcast(new JoinedSuccessfully($game))->toOthers();
        }

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
    public function gameEnd(Request $request)
    {
        /*
        winner: 0->draw;
                1->white;
                2->black
        */
        // dd($request->gameId);
        $finishedGame = DB::table('games')->where('id', $request->gameId)->get();
        $whiteId = $finishedGame[0]->white;
        $blackId = $finishedGame[0]->black;
        $winner = $request->winner;
        // dd($whiteId);
        if ($winner == 1) {
            $winPlayer = DB::table('users')->where('id', $whiteId)->get();
            // dd($winPlayer);
            $winPlayerWins = $winPlayer[0]->wins;
            $winPlayerWins = $winPlayerWins + 1;
            DB::table('users')->where('id', $winPlayer[0]->id)->update(['wins' => $winPlayerWins]);
            $winPlayer = DB::table('users')->where('id', $whiteId)->get();

            $lostPlayer = DB::table('users')->where('id', $blackId)->get();
            $lostPlayerLost = $lostPlayer[0]->loses;
            $lostPlayerLost = $lostPlayerLost + 1;
            DB::table('users')->where('id', $lostPlayer[0]->id)->update(['loses' => $lostPlayerLost]);

            //  dd(  $winPlayerWins);
        } else if ($winner == 2) {
            $winPlayer = DB::table('users')->where('id', $blackId)->get();
            // dd($winPlayer);
            $winPlayerWins = $winPlayer[0]->wins;
            $winPlayerWins = $winPlayerWins + 1;
            DB::table('users')->where('id', $winPlayer[0]->id)->update(['wins' => $winPlayerWins]);


            $lostPlayer = DB::table('users')->where('id', $whiteId)->get();
            $lostPlayerLost = $lostPlayer[0]->loses;
            $lostPlayerLost = $lostPlayerLost + 1;
            DB::table('users')->where('id', $lostPlayer[0]->id)->update(['loses' => $lostPlayerLost]);
        } else if ($winner == 0) {

            $winPlayer = DB::table('users')->where('id', $whiteId)->get();
            // dd($winPlayer);
            $winPlayerWins = $winPlayer[0]->draws;
            $winPlayerWins = $winPlayerWins + 1;
            DB::table('users')->where('id', $winPlayer[0]->id)->update(['draws' => $winPlayerWins]);
            //sve isto i za crnog sad
            $winPlayer = DB::table('users')->where('id', $blackId)->get();
            // dd($winPlayer);
            $winPlayerWins = $winPlayer[0]->draws;
            $winPlayerWins = $winPlayerWins + 1;
            DB::table('users')->where('id', $winPlayer[0]->id)->update(['draws' => $winPlayerWins]);

         }
    }
}
