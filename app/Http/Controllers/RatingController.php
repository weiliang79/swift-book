<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function index(Request $request)
    {
        $book = Book::find($request->book_id);
        //dd($book);

        return view('rating.index', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'star' => 'required|numeric',
        ]);
        //dd($request);

        $book = Book::find($request->book_id);
        $book->ratings()->create([
            'user_id' => Auth::user()->id,
            'rating' => $request->star,
            'comment' => $request->comment,
        ]);

        return redirect()->route('order_history')->with('swal-success', 'Rating submit successful.');
    }
}
