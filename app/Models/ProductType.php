<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'checkactive',
        'id',
    ];


    //thiết lập mối quan hệ giữa loại sản phẩm và sản phẩm 1-n
    public function product()
    {
        return $this->hasMany(Product::class,'id');
    }
  
}
