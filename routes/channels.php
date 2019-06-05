<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('chat', function ($user) {
    return [
        'id' => $user->id,
        'name' => $user->name
    ];
});

use App\Game;

Broadcast::channel('game.{id}.{min}.{inc}', function($user, $id, $format, $inc) {
    $game = Game::findOrFail($id);
    return (int) $user->id === (int) $game->white ||
            (int) $user->id === (int) $game->black;
});
