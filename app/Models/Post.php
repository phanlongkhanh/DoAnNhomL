<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'post';
    protected $fillable = [
        'id_list_post',
        'name',
        'description',
        'image',
        'content',
    ];

    public function listPost()
    {
        return $this->belongsTo(ListPost::class, 'id_list_post');
    }
}
