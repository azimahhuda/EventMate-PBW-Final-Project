<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEventMate extends Model
{
    use HasFactory;
    protected $table = "user_event_mate";


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
