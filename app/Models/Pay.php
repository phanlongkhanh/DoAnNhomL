<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pay extends Model
{
    use HasFactory;

    protected $table = 'pays'; 

    protected $fillable = [
        'id_user',
        'id_transport',
        'id_payment',   
        'id_cart', 
        'name',
        'phone',
        'amount',       
        'price',       
        'description',
        'address',
        'total_price',  
        'active',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Quan hệ với model Transport (nếu có)
    public function transport()
    {
        return $this->belongsTo(Transport::class, 'id_transport');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'id_payment');
    }

    public function carts()
    {
        return $this->hasMany(Cart::class, 'id_cart');
    }
}
