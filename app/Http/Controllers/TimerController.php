<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\TimerClicked;
use App\Game;

class TimerController extends Controller
{
    //

    public function update(Request $request)
    {
        $game = Game::findOrFail($request->id);
        $timer = $request->timer;
        broadcast(new TimerClicked($game, $timer))->toOthers();

        return response();
    }
}
