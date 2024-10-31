<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

       // Tên bảng
       protected $table = 'orders';

       protected $fillable = [
           'id_user',
           'id_pays',
           'status',
           'amount',
           'intomoney',
       ];
   
      
       public function user()
       {
           return $this->belongsTo(User::class, 'id_user');
       }
   
       public function pay()
       {
           return $this->belongsTo(Pay::class, 'id_pays');
       }
}
