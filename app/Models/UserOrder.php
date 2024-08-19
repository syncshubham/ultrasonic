<?php

// app/Models/UserOrder.php

namespace App\Models;

use App\Models\User;
use App\Models\UserAddress;
use App\Models\admin\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'product_id',
        'product_name',
        'final_price',
        'size',
        'address_id',
        'payment_id',
        'order_status',
        'order_id',
        'payment_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }

    public function address()
    {
        return $this->belongsTo(UserAddress::class);
    }


}

