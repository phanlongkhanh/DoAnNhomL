<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $table = 'favorite';

    // Nếu bạn không muốn dùng các cột timestamps, hãy bỏ chúng
    public $timestamps = true;

    // Các thuộc tính có thể được gán
    protected $fillable = [
        'id_product',
        'name',
        'price',
        'image',
    ];
}
