<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Move extends Model
{
    protected $fillable = [
        'fen',
        'game_id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

}
