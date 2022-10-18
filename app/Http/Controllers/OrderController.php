<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {

        OrderController::checkOrdersExpire(Auth::user()->id);

        $orders = Auth::user()->orders()->with(['info', 'books'])->orderBy('created_at', 'desc')->get();
        
        return view('order_history.index', compact('orders'));
    }

    public function adminIndex(){
        OrderController::checkOrdersExpire();

        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('admin.orders.index', compact('orders'));
    }

    public function adminDetail(Request $request){
        $order = Order::find($request->order_id);
        return view('admin.orders.detail', compact('order'));
    }

    private function checkOrdersExpire($user_id = null){
        
        if($user_id !== null){
            $orders = User::find($user_id)->orders()->get();
        } else {
            $orders = Order::all();
        }
        
        foreach($orders as $order){
            $now = Carbon::now();
            $temp = $order->updated_at->copy();
            $temp->addHours(3);
            //dd($order, $now, $temp, $now->gt($temp));
            if($order->status === 'fail' && $now->gt($temp)){
                $order->status = 'expired';
                $order->save();
            }
        }
    }
}
