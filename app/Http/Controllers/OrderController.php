<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {

        $orders = Auth::user()->orders()->with(['info', 'books'])->get();
        //dd($orders, $orders->first()->books()->withPivot('quantity')->get());
        return view('order_history.index', compact('orders'));
    }
}
