<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Models\Order;
use App\Models\OrderInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    /**
     * Decide what page to show when /checkout is accessed
     *
     */
    public function index()
    {
        // 1. check cart, cart empty go 2, cart not empty go 3
        // 2. redirect to cart, log info user trying to access checkout while cart empty
        // 3. check last order, last order pending go 4, last order not pending go 5
        // 4. check if has information, has information go 6, no information go 7
        // 5. create new order with pending status and return view information page
        // 6. redirect to payment page
        // 7. get order and return view information page
        $user = User::find(Auth::user()->id);

        if ($user->carts->isEmpty()) {
            Log::info("user $user->id tried to access checkout while cart is empty, redirected");
            return redirect('/cart');
        }

        // check order status
        $latestOrder = $user->orders()->latest()->first();

        // no order or not pending
        if ($latestOrder == null || $latestOrder->status != "pending") {
            // new order
            $order = new Order;
            $order->user_id = $user->id;
            $order->status = "pending";
            $order->save();
            $summary = $this->getSummary($user);
            return view('checkout.information', ['order' => $order, 'carts' => $user->carts, 'summary' => $summary]);
        }

        // pending
        if ($latestOrder->info) {
            return redirect()->route('checkout.pay', ['order' => $latestOrder->id]);
        } else {
            $order = $latestOrder;
            $summary = $this->getSummary($user);
            return view('checkout.information', ['order' => $order, 'carts' => $user->carts, 'summary' => $summary]);
        }

        abort(404, 'unhandled case');
    }

    /**
     * Store shipping information in order
     *
     */
    public function store(StoreOrderRequest $request, Order $order)
    {
        // TODO: implement remember address or delete it
        $orderInfo = OrderInfo::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'address' => $request->address,
            'address2' => $request->address2,
            'state' => $request->state,
            'town' => $request->town,
            'postcode' => $request->postcode,
            'phoneNumber' => $request->phoneNumber,
            'rememberAddress' => $request->rememberAddress,
        ]);
        $order->info()->save($orderInfo);
        return redirect("/checkout/pay/$order->id");
    }

    /**
     * Display payment page
     */
    public function payment(Order $order)
    {
        
        //dd($order->status);
        if ($order->status == 'success' || $order->status == 'expired')
            return abort(400, 'payment already submitted, check payment history');
        $summary = $this->getSummary(Auth::user());
        return view('checkout.payment', ['order' => $order, 'summary' => $summary]);
    }

    /**
     * Fill remaining data in order and attempt payment
     */
    public function pay(StorePaymentRequest $request, Order $order)
    {
        $user = User::find(Auth::user()->id);
        // only allow pending or fail status
        if ($order->status == 'success' || $order->status == 'expired')
            return abort(400);
        // only move cart items when pending
        if ($order->status == 'pending') {
            $user->carts->each(function ($cart, $key) use ($order) {
                $order->books()->attach($cart->book->id, ['quantity' => $cart->quantity]);
                $cart->delete();
            });
        }
        if ($this->callFakePaymentApi($request)) {
            $order->status = 'success';
            $order->save();
        } else {
            $order->status = 'fail';
            $order->save();
        }
        if (Order::where('user_id', $user->id)->where('status', 'pending')->get()->isEmpty()) {
            Log::error("user $user->id still has status pending order after process payment, please check");
        }
        if ($order->status == 'success') {
            return view('checkout.success');
        }
        if ($order->status == 'fail') {
            return view('checkout.fail');
        }
        abort(404, 'unhandled case');
    }

    // TODO: refactor into Service class, shared by two controller
    /**
     * @return array
     */
    private function getSummary($user)
    {
        $subtotal = $user->carts->reduce(function ($carry, $cart) {
            $price = $cart->quantity * $cart->book->price;
            return $carry + $price;
        });
        $SHIPPING_FEE = 5;
        $total = $subtotal + $SHIPPING_FEE;
        return [$subtotal, $SHIPPING_FEE, $total];
    }

    /**
     * @return bool
     */
    private function callFakePaymentApi()
    {
        sleep(2);
        return false;
    }
}
