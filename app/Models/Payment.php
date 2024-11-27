<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'id_pay');
    }
}
