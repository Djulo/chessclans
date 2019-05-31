<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Move;

class AnalyseController extends Controller
{
    //
    public function index()
    {
        return view("analyse");
    }

    public function nextMove(Request $request)
    {
        $id = $request->id;
        $fen = DB::table('moves')->where('id', $id)->pluck('fen');

        return $fen;
    }

    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('analyse')->withGame($game);
    }
}
