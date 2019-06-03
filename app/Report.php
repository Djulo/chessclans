<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    

    public function reporter()
    {
        return $this->belongsTo(User::class,'idReporter');
    }

    public function reported()
    {
        return $this->belongsTo(User::class, 'idReported');
    }
}
