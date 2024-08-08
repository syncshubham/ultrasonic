<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserAddress extends Model
{
    use HasFactory;
    protected $table = 'user_addresses';

    protected $fillable = [
        'user_id', 'address_first_line', 'address_second_line', 'city', 'pin_code', 'country'
    ];

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');  // Using class name resolution
    }
}

