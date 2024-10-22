<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id_product';

    protected $fillable = [
        'name',
        'price',
        'discount',
        'image',
        'id_category',
        'id_producttype',
        'checkactive',
        'amount',
        'id',
        'description',
        'content',
        'sizes',
    ];

    protected $casts = [
        'list_images' => 'array',
    ];

}
