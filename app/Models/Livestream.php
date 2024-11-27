<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livestream extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'video_url'];

    /**
     * Quan hệ với bảng messages (một livestream có nhiều tin nhắn).
     */
    public function messages()
    {
        return $this->hasMany(Message::class, 'id_livestreams');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'id_livestreams');
    }
}