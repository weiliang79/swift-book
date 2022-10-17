<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $book = Book::find($request->book_id);
        //dd($book);

        return view('rating.index');
    }
}
