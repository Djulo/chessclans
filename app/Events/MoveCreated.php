<?php

namespace App\Events;

use App\Move;
use App\Game;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;

class MoveCreated implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $move;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Move $move)
    {
        $this->move = $move;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $str = explode('+',$this->move->game()->format);
        return new Channel('game.' . $this->move->game_id . '.' . $str[0] . '.' . $str[1]);
    }

    public function broadcastAs()
    {
        return 'move.played';
    }
}
