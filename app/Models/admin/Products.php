<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{   
    use HasFactory;
    protected $fillable = [
        'id',
        'product_name',
        'unit',
        'exchangeable',
        'refundable',
        'sizes',
        'short_desc',
        'more_details',
        'bulletin_1',
        'bulletin_2',
        'bulletin_3',
        'bulletin_4',
        'bulletin_5',
        'image_1',
        'image_2',
        'image_3',
        'image_4',
        'image_5',
        'price',
        'disc_rate',
        'disc_price',
        'final_price',
        'status',
    ];

    protected $primaryKey = 'id';
}