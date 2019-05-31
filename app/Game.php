<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    protected $fillable = [
        'white',
        'black'
    ];

    public function moves()
    {
        return $this->hasMany('App\Move');
    }

    public function white()
    {
        return $this->belongsTo('App\User', 'white');
    }

    public function black()
    {
        return $this->belongsTo('App\User', 'black');
    }

}
