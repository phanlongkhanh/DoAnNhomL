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
        'description',
        'discount',
        'image',
        'id_category',
        'id_producttype',
        'id_suppliers',
        'checkactive',
        'amount',
        'id',
    ];

    protected $casts = [
        'list_images' => 'array',
    ];

   
    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_product', 'id_product');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id'); 
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'id_product');
    }

    public static function search($query)
    {
        return self::whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", [$query]);
    }

    public function pays()
    {
        return $this->hasMany(Pay::class, 'id_product');
    }

    
    public function productType() {
        return $this->belongsTo(ProductType::class);
    }
    
    public function supplier() {
        return $this->belongsTo(Suppliers::class);
    }
    
}
