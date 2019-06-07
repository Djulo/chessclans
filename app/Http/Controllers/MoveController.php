<?php

/**
 * MoveController, kontroler koji se koristi pri odigravanju poteza
 */
namespace App\Http\Controllers;

use App\Move;
use App\Game;
use Illuminate\Http\Request;
use App\Events\MoveCreated;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Log;

class MoveController extends Controller
{

    /**
     * Prikaz stranice koja sadrzi json objekat svih odigranih poteza
     *
     * @return void
     */
    public function index()
    {
        $moves = Move::with(['game'])->get();
        return response()->json($moves);
    }

    /**
     * Kreiranje poteza, smestanje u bazu
     * Pozivanje eventa MoveCreated
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $fen = $request->fen;
        $id = $request->id;

        $move = new Move;
        $move->fen = $fen;
        $move->game_id = $id;
        $move->save();

        $move = Move::latest()->first();
        $format = Game::findOrFail($id)->format;
        broadcast(new MoveCreated($move, $format))->toOthers();

        return response()->json($move);
    }
}
