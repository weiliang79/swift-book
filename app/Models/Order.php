<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * Get the shipping info associated with the user.
     */
    public function info()
    {
        return $this->hasOne(OrderInfo::class);
    }

    /**
     * Get the books associated with the order.
     */
    public function books()
    {
        return $this->belongsToMany(Book::class, 'order_detail');
    }

    /**
     * Get the user associated with the order.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
