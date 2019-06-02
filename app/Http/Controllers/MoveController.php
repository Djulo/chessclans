<?php

namespace App\Http\Controllers;

use App\Move;
use Illuminate\Http\Request;
use App\Events\MoveCreated;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\Log;

class MoveController extends Controller
{

    public function index()
    {
        $moves = Move::with(['game'])->get();
        return response()->json($moves);
    }

    public function store(Request $request)
    {
        $fen = $request->fen;
        $id = $request->id;

        $move = new Move;
        $move->fen = $fen;
        $move->game_id = $id;
        $move->save();

        $move = Move::latest()->first();
        broadcast(new MoveCreated($move))->toOthers();

        return response()->json($move);
    }
}
