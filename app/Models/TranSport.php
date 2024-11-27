<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranSport extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'id',
        'image',
    ];

    public function pays()
    {
        return $this->hasMany(Pay::class, 'id_transport');
    }
}
