<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {

        $orders = Auth::user()->orders()->get();
        
        foreach($orders as $order){
            $now = Carbon::now()->addHours(4);
            $temp = $order->updated_at->copy();
            $temp->addHours(3);
            //dd($order, $now, $temp, $now->gt($temp));
            if($order->status === 'fail' && $now->gt($temp)){
                $order->status = 'expired';
                $order->save();
            }
        }

        $orders = Auth::user()->orders()->with(['info', 'books'])->orderBy('created_at', 'desc')->get();
        
        return view('order_history.index', compact('orders'));
    }
}
