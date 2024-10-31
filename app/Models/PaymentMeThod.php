<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMeThod extends Model
{
    use HasFactory;


    protected $table = 'payment';

    protected $fillable = [
        'id_pay',
        'name',
        'description',
        'active',
    ];

    public function pays()
    {
        return $this->hasMany(Pay::class, 'id_payment');
    }

    
}
