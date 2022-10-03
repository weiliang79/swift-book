<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'isbn',
        'price',
        'quantity',
        'image_path',
    ];

    /**
     * The books that belong to the cart.
     */
    public function books()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }
}
