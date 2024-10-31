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

     // Liên kết một sản phẩm với nhiều giỏ hàng
     public function carts()
     {
         return $this->hasMany(Cart::class, 'id_product', 'id_product');
     }

       // Liên kết nhiều sản phẩm với một danh mục
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category', 'id'); // Tham chiếu đến id của bảng categories
    }

      // Nếu bạn muốn thêm mối quan hệ với bảng favorite
      public function favorites()
      {
          return $this->hasMany(Favorite::class, 'id_product');
      }
      
      //Tìm kiếm
      public static function search($query)
      {
          return self::whereRaw("MATCH(name, description) AGAINST(? IN BOOLEAN MODE)", [$query]);
      }

      public function pays()
    {
        return $this->hasMany(Pay::class, 'id_product');
    }

}
