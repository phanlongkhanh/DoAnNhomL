<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'checkactive',
        'id',
        'category_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

