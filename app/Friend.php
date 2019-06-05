<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;
use App\Report;
use App\Game;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Friend extends Model
{
    //
   
    public function idfriend1()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function idfriend2()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
