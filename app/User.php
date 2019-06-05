<?php

namespace App;

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
<<<<<<< HEAD
        'name', 'email', 'password', 'profile_image', 'country', 'bio'
=======
        'name', 'email', 'password', 'profile_image', 'country', 'bio',
>>>>>>> fcaf10ea7064da25e1f9f6dca17b4b9c08842502
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

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function getImageAtrribure()
    {
        return $this->profile_image;
    }

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }
}
