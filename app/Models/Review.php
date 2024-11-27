<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review_product';

    protected $fillable = [
        'id_user',
        'id_product',
        'comment',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }
}
