<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    private const SHIPPING_FEE = 5;
    /**
     * Display the cart page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $summary = $this->getSummary($user);
        return view('cart', ['carts' => $user->carts, 'summary' => $summary]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function add($book_id, Request $request)
    {
        $cart = $request->user()->carts()->firstOrCreate([
            'user_id' => $request->user()->id,
            'book_id' => $book_id
        ], [
            'quantity' => 1
        ]);
        return response()->json(["cart" => $cart]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($book_id, $quantity, Request $request)
    {
        Validator::make(['book' => $book_id], [
            'book' => 'required|exists:books,id'
        ])->validate();
        $bookModel = Book::find($book_id);

        if ($quantity < 1) {
            return response()->json([
                'message' => 'Minimum quantity is one'
            ], 422);
        }

        if ($quantity > $bookModel->quantity) {
            return response()->json([
                'message' => 'Out of stock, maximum quantity reached'
            ], 422);
        }

        $cart = $request->user()->carts()->updateOrCreate([
            'user_id' => $request->user()->id,
            'book_id' => $book_id,
        ], [
            'quantity' => $quantity
        ]);

        $summary = $this->getSummary($request->user());

        return response()->json(['cart' => $cart, 'summary' => $summary]);
    }

    /**
     * Remove a specific cart item.

     * @param  Book $book
     * @return \Illuminate\Http\JsonResponse
     */
    public function remove($book_id, Request $request)
    {
        $result = $request->user()->carts()->where('book_id', $book_id)->delete();
        if (!$result) {
            return redirect('/cart')->withErrors('delete cart item failed');
        }

        return redirect('/cart');
    }

    /**
     * @return array
     */
    private function getSummary($user) {
        $subtotal = $user->carts->reduce(function ($carry, $cart) {
            $price = $cart->quantity * $cart->book->price;
            return $carry + $price;
        });
        $total = $subtotal + self::SHIPPING_FEE;
        $numberOfBooks = $user->carts->count();
        return [$subtotal, self::SHIPPING_FEE, $total, $numberOfBooks];
    }
}
