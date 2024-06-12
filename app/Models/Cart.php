<?php

namespace App\Models;

use App\Models\admin\Products;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'size'
    ];

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
