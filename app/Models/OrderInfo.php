<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'firstName',
        'lastName',
        'address',
        'address2',
        'state',
        'town',
        'postcode',
        'phoneNumber',
        'rememberAddress',
    ];

    /**
     * Get the order this model belongs.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
