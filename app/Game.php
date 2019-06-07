<?php

/**
 * Model Game
 * Autor: Nikola Kovacevic
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'white',
        'black',
        'format',
    ];

    /**
     * skup poteza odigranih na partiji
     *
     * @return void
     */
    public function moves()
    {
        return $this->hasMany('App\Move');
    }

    /**
     * vraca usera koji predstavlja belog igraca
     *
     * @return void
     */
    public function white()
    {
        return $this->belongsTo('App\User', 'white');
    }

    /**
     * vraca usera koji predstavlja crnog igraca
     *
     * @return void
     */
    public function black()
    {
        return $this->belongsTo('App\User', 'black');
    }

}
