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
        Log::debug('Some message.');
        return response()->json($moves);
        //return view('welcome');
    }

    public function store(Request $request)
    {
        $fen = $request->fen;
        $id = $request->id;

        $move = new Move;
        $move->fen = $fen;
        $move->game_id = $id;
        $move->save();

        error_log('Some message here.');

        $move = Move::latest()->first();
        event(new MoveCreated($move));

        return response()->json($move);
    }
}
