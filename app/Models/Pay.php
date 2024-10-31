<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $table = 'pay'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = [
        'id_product',
        'id_user',
        'id_transport',
        'id_payment',
        'description',
        'address',
        'name',
        'price',
        'amount',
    ];

    // Định nghĩa quan hệ với sản phẩm
    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    // Định nghĩa quan hệ với người dùng
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Định nghĩa quan hệ với đơn vị vận chuyển
    public function transport()
    {
        return $this->belongsTo(Transport::class, 'id_transport');
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class, 'id_payment');
    }


}
