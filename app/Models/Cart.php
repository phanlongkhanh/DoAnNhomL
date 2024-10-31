<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable = [
        'id_user',
        'id_product',    // ID sản phẩm
        'name',          // Tên sản phẩm
        'amount',        // Số lượng
        'image',         // Hình ảnh sản phẩm
        'total_price',  // Thành tiền
        'price',
    ];

    // Liên kết giỏ hàng với một sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
