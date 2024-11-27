<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = ['id_user', 'id_livestreams', 'message'];

    public function livestream()
    {
        return $this->belongsTo(Livestream::class, 'id_livestreams');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}