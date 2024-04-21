<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\User;
use App\Models\Address;
use App\Models\Billing;
use App\Models\Card;
use App\Models\Payment;
use App\Models\Order;
use App\Models\Product;
use Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function index($id)
    {
        $user = User::find($id);

        $orders = Order::where("user_id", $id)->with([
            'products' => function ($query) {
                $query->withPivot('quantity');
            }
        ])->get();

        $orderTotals = [];

        foreach ($orders as $order) {
            $orderTotals[$order->id] = $order->getTotalAmount();
        }

        return view('User/Order/list', compact('id', 'orders', 'user', 'orderTotals'));
    }


    public function create($id)
    {
        $cart = Cart::findOrFail($id);
        $products = $cart->products()->get();

        $productTotal = 0;
        foreach ($products as $product) {
            $productTotal += $product->pivot->quantity * $product->price;
        }

        $userAddresses = Address::where("user_id", Auth::user()->id)->get();
        $userBillings = Billing::where("user_id", Auth::user()->id)->get();
        $userCards = Card::where("user_id", Auth::user()->id)->get();

        return view("/user/order/create", compact("products", "productTotal", "userAddresses", "userBillings", "userCards"));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postShipping' => 'required',
            'postBilling' => 'required',
        ]);

        $validator->setCustomMessages([
            'postShipping.required' => 'Shipping',
            'postBilling.required' => 'Billing',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $paymentMethod = $request->postCard ? 'card' : 'cash';
        $cardId = $request->postCard ? $request->postCard : null;
        $payStatus = $request->postCard ? 'completed' : 'pending';

        $payment = Payment::create([
            "user_id" => Auth::user()->id,
            "amount" => $request->total,
            "status" => $payStatus,
            "card_id" => $cardId,
            "payment_method" => $paymentMethod,
            "billing_id" => $request->postBilling
        ]);


        if (!$payment) {
            return redirect()->back()
                ->withErrors(['error' => 'Payment failed. Try again.'])
                ->withInput();
        }

        $order = Order::create([
            "status" => "pending",
            "user_id" => Auth::user()->id,
            "address_id" => $request->postShipping,
            "payment_id" => $payment->transaction_id,
        ]);

        if (!$order) {
            return redirect()->back()
                ->withErrors(['error' => 'Order failed. Try again.'])
                ->withInput();
        }

        $products = $request->input('productIds');
        $quantities = $request->input('quantities');
        $productData = [];

        for ($i = 0; $i < count($products); $i++) {
            $productId = $products[$i];
            $quantity = $quantities[$i];
            $product = Product::find($productId);

            if ($product) {
                $productData[$productId] = [
                    'quantity' => $quantity,
                    'price' => $product->price * $quantity
                ];
            }
        }

        $order->products()->attach($productData);

        activity('new')
            ->causedBy(auth()->user())
            ->performedOn($order)
            ->log(' placed an order.');

        $cart = Cart::where("user_id", Auth::user()->id)->first();

        if ($cart) {
            $cart->products()->detach();
            $cart->delete();
        }

        return redirect()->route('order.thanku')->with('success', 'Success');

    }

    public function thanks()
    {
        return view('/User/Order/thanks');
    }

    public function show($id)
    {
        $order = Order::with([
            'products' => function ($query) {
                $query->withPivot('quantity', 'price');
            }
        ])->find($id);
        $total = $order->getTotalAmount();
        $products = $order->products()->where("order_id", $id)->get();
        $address = Address::where("id", $order->address_id)->first();
        $payment = Payment::where("transaction_id", $order->payment_id)->first();
        $billing = Billing::where("id", $payment->billing_id)->first();

        return view('/User/Order/details', compact('order', 'products', 'total', 'address', 'payment', 'billing'));
    }


    public function invoice($id)
    {
        $order = Order::with([
            'products' => function ($query) {
                $query->withPivot('quantity', 'price');
            }
        ])->find($id);
        $total = $order->getTotalAmount();
        $products = $order->products()->where("order_id", $id)->get();
        $address = Address::where("id", $order->address_id)->first();
        $payment = Payment::where("transaction_id", $order->payment_id)->first();
        $billing = Billing::where("id", $payment->billing_id)->first();
        $card = Card::where("id", $payment->card_id)->first();

        return view('/User/Order/invoice', compact('order', 'products', 'total', 'address', 'payment', 'billing', 'card'));
    }

    public function cancel($id)
    {
        $order = Order::findOrFail($id);
        $payment = Payment::where('user_id', Auth::user()->id)->first();
        if ($order->status === 'canceled') {
            return redirect()->back()->with('error', "Order has already been cancelled.");
        } else if ($order->status !== 'shipped' && $order->status !== 'delivered') {
            $order->status = 'canceled';
            $order->save();
            activity('canceled')
                ->causedBy(auth()->user())
                ->performedOn($order)
                ->log(' has cancelled an order.');
            return redirect()->back()->with('success', "Order canceled!");
        } else {
            return redirect()->back()->with('error', "Order not eligble for cancellation. Contact customer support.");
        }
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $products = $order->products()->withPivot("quantity", "price")->get();
        $address = Address::where("id", $order->address_id)->first();
        $payment = Payment::where("transaction_id", $order->payment_id)->first();
        $billing = Billing::where("id", $payment->billing_id)->first();
        $card = Card::where("id", $payment->card_id)->first();
        $user = User::where("id", $order->user_id)->first();
        return view("/admin/order/edit", compact("order", "products", "payment", "address", "billing", "card", "user"));
    }

    public function list()
    {
        $orders = Order::all();
        return view("/admin/order/list", compact("orders"));
    }

    public function details($id)
    {
        $order = Order::findOrFail($id);
        $products = $order->products()->withPivot("quantity", "price")->get();
        $address = Address::where("id", $order->address_id)->first();
        $payment = Payment::where("transaction_id", $order->payment_id)->first();
        $billing = Billing::where("id", $payment->billing_id)->first();
        $card = Card::where("id", $payment->card_id)->first();
        $user = User::where("id", $order->user_id)->first();
        return view("/admin/order/details", compact("order", "products", "payment", "address", "billing", "card", "user"));
    }


    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $quantities = $request->input('quantities', []);

        foreach ($quantities as $productId => $quantity) {
            if ($quantity > 0) {
                $product = Product::find($productId);
                if ($product) {
                    $newPrice = $quantity * $product->price;
                    $order->products()->updateExistingPivot($productId, [
                        'quantity' => $quantity,
                        'price' => $newPrice
                    ]);
                }
            }
        }

        $order->refresh();

        return back()->with('success', 'Product quantities updated.');
    }

    public function orderStatusUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered'
        ]);

        $order = Order::findOrFail($id);
        $order->status = $validated['status'];
        $order->save();

        activity($order->status)
                ->causedBy(auth()->user())
                ->performedOn($order)
                ->log(' changed #' . $order->id . ' status to ' . $order->status . '.');

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
    public function paymentStatusUpdate(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,completed,failed,refunded'
        ]);

        $payment = Payment::findOrFail($id);
        $payment->status = $validated['status'];
        $payment->save();

        $order = Order::where('payment_id', $payment->transaction_id)->first();

        $logMessage = '';
        if ($payment->status == 'refunded') {
            $logMessage = ' has issued a refund for order #' . $order->id .'.';
            activity('refunded')
                ->causedBy(auth()->user())
                ->performedOn($payment)
                ->log($logMessage);
        }else{
            activity('refunded')
                ->causedBy(auth()->user())
                ->performedOn($payment)
                ->log(' changed payment status for order #' . $order->id .' to ' . $payment->status . '.');
        }

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }


    public function destroy($id)
    {
        //
    }
}
