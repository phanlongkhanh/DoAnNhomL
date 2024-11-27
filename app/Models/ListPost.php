<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListPost extends Model
{
    use HasFactory;

    protected $table = 'list_post';

    protected $fillable = [
        'name',
        'id_user',
        'description',
        'image',
        'checkactive',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
