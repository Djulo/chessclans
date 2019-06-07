<?php

namespace App;

/**
 * Model User
 * Autor: NIkola Kovacevic
 */

use App\Message;
use App\Report;
use App\Game;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_image', 'country', 'bio'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Skup poruka koje je korisnik poslao
     *
     * @return void
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    /**
     * Profilna slika
     *
     * @return void
     */
    public function getImageAtrribute()
    {
        return $this->profile_image;
    }

    /**
     * Partije koje je korisnik odigrao
     *
     * @return void
     */
    public function games()
    {
        return $this->hasMany(Game::class);
    }

}
