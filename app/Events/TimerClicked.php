<?php
/**
 * Event koji se poziva kada se pritisne timer u igri
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

class TimerClicked implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $game;
    public $timer;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Game $game, $timer)
    {
        $this->game = $game;
        $this->timer = $timer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $str = explode('+',$this->game->format);
        return new Channel('game.' . $this->game->id . '.' . $str[0] . '.' . $str[1]);
    }

    /**
     * naziv eventa
     *
     * @return void
     */
    public function broadcastAs()
    {
        return 'timer.clicked';
    }
}
