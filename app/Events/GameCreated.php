<?php
/**
 *  Event klasa koja se poziva kad se inicijalizuje partija
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

class GameCreated implements ShouldBroadcastNow
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
        // $str = explode('+', $this->game->format);
        // dd('game.' . $this->game->id . '.' . $str[0] . '.' . $str[1]);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        //dd($this->game);
        $str = explode('+', $this->game->format);
        return new Channel('game.setup');
    }

    /**
     * postavlja naziv eventa
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'game.created';
    }
}
