<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Spatie\Searchable\Search;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }

    public function showCreateForm()
    {
        return view('admin.book.edit');
    }

    public function saveBook(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'isbn' => 'required',
                'price' => 'required|regex:/^[0-9]*(\.[0-9]{0,2})?$/',
                'quantity' => 'required|numeric|gt:0',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5000',            //['nullable', File::types(['png', 'jpg', 'jpeg'])]
            ],
            [
                'price.regex' => 'The price field must fill as decimal with two decimal places.',
            ]
        );

        $book = Book::create([
            'name' => $request->name,
            'isbn' => $request->isbn,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/images', ['disk' => 'public']);
            $book->image_path = $path;
            $book->save();
        }

        return redirect()->route('admin.books')->with('success', 'Book Info has save successful.');
    }

    public function showEditForm(Request $request)
    {
        $book = Book::find($request->book_id);

        return view('admin.book.edit', compact('book'));
    }

    public function updateBook(Request $request)
    {

        $request->validate(
            [
                'name' => 'required',
                'isbn' => 'required',
                'price' => 'required|regex:/^[0-9]*(\.[0-9]{0,2})?$/',
                'quantity' => 'required|numeric|gt:0',
                'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:5000',            //['nullable', File::types(['png', 'jpg', 'jpeg'])]
            ],
            [
                'price.regex' => 'The price field must fill as decimal with two decimal places.',
            ]
        );

        $book = Book::find($request->book_id);

        $book->update([
            'name' => $request->name,
            'isbn' => $request->isbn,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        if ($request->hasFile('image')) {
            Storage::delete('public/' . $book->image_path);

            $path = $request->file('image')->store('/images', ['disk' => 'public']);
            $book->image_path = $path;
            $book->save();
        }

        return redirect()->route('admin.books')->with('success', 'Book Info has update successful.');
    }

    public function deleteBook(Request $request)
    {
        Book::find($request->book_id)->delete();

        return response()->json('Book info delete successful.');
    }

    public function search(Request $request)
    {
        $results = (new Search())
            ->registerModel(Book::class, ['name'])
            ->search($request->input('query'));

        return response()->json($results);
    }
}
