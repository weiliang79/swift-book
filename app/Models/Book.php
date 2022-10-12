<?php

namespace App\Models;

use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model implements Searchable
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

    /**
     * The books that belong to the cart.
     */
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_detail');
    }

    public function getSearchResult(): SearchResult
    {
       $url = route('book.detail', $this->id);
         
       return new SearchResult($this, $this->name, $url);
    }
}
