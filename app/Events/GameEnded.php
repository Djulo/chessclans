<?php

/**
 *  Event koji se poziva kada se partija zavrsi
 *  Autor: Nikola Kovacevic
 */

namespace App\Events;

use App\Game;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class GameEnded implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $game;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $str = explode('+', $this->game->format);
        return new Channel('game.' . $this->game->id . '.' . $str[0] . '.' . $str[1]);
    }


    /**
     * naziv eventa
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'game.ended';
    }
}
