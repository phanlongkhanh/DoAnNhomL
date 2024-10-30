<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_product',
        'id_transport',
        'status',
        'amount',
        'intomney',
        'id_pay',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product', 'id_product');
    }

    public function transport()
    {
        return $this->belongsTo(Transport::class, 'id_transport');
    }

    // public function payment()
    // {
    //     return $this->belongsTo(Payment::class, 'id_pay');
    // }

    public function getStatus($status)
    {
        $statuses = [
            'Đã tiếp nhận' => [
                'class' => 'primary', // CSS class for this status
                'name' => 'Đã tiếp nhận', // Display name for this status
            ],
            'Đang giao' => [
                'class' => 'info',
                'name' => 'Đang giao',
            ],
            'Hoàn thành' => [
                'class' => 'success',
                'name' => 'Đã giao',
            ],
            'Đã hủy' => [
                'class' => 'danger',
                'name' => 'Đã hủy',
            ],
            // Add more statuses if needed
        ];

        // Return the status array or a default value
        return $statuses[$status] ?? [
            'class' => 'default',
            'name' => 'Không xác định', // Default status name
        ];
    }
}
