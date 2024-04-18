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

    public function storeAddress(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'street' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'zip' => 'required|numeric|digits:5'
        ]);

        $validator->setCustomMessages([
            'street.required' => 'Street',
            'city.required' => 'City',
            'state.required' => 'State',
            'country.required' => 'Country',
            'zip.required' => 'Zip',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();

        $address = Address::create([
            "user_id" => $user->id,
            "street" => $request->street,
            "city" => $request->city,
            "state" => $request->input("state"),
            "country" => $request->input("country"),
            "zip" => $request->zip
        ]);

        if (!$address) {
            return redirect()->back()->with("addressError", "Error trying to add address. Try again.");
        }
        return redirect()->back();

    }
    public function storeBilling(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "name" => "required",
            "email" => "required",
            "phone" => "required",
            "address" => "required",
            "city" => "required",
            "state" => "required",
            "country" => "required",
            "zip" => "required"
        ]);

        $validator->setCustomMessages([
            "name" => "Name",
            "email" => "Email",
            "phone" => "Phone",
            "address" => "Address",
            "city" => "City",
            "state" => "State",
            "country" => "Country",
            "zip" => "Zip",
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }


        $user = Auth::user();

        $billing = Billing::create([
            "user_id" => $user->id,
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "address" => $request->address,
            "city" => $request->city,
            "state" => $request->input("state"),
            "country" => $request->input("country"),
            "zip" => $request->zip
        ]);

        if (!$billing) {
            return redirect()->back()->with("addressError", "Error trying to add address. Try again.");
        }

        return redirect()->back();
    }
    public function storeCard(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'number' => 'required',
            'expiration_date' => 'required',
            'cvc' => 'required',
            'holder' => 'required',
        ]);

        $validator->setCustomMessages([
            'number.required' => 'Card number',
            'expiration_date.required' => 'Card Expiration date',
            'cvc.required' => 'CVC',
            'holder.required' => 'Card holder',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth::user();
        $card = Card::create([
            "number" => $request->number,
            "expiration_date" => $request->expiration_date,
            "cvc" => $request->cvc,
            "holder" => $request->holder,
            "user_id" => $user->id,
        ]);

        if (!$card) {
            return redirect()->back()->with("addressError", "Error trying to add card. Try again.");
        }

        return redirect()->back();
    }

    public function store(Request $request)
    {
        // dd([
        //     "total" => $request->total,
        //     "postCard" => $request->postCard,
        //     "postShipping" => $request->postShipping
        // ]);


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


        // dd([
        //     'transaction_id' => $payment->id,
        //     "user_id" => $payment->user_id,
        //     "amount" => $payment->amount,
        //     "status" => $payment->status,
        //     "card_id" => $payment->card_id,
        //     "billing_id" => $payment->billing_id,
        // ]);

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

        // dd([
        //     "status" => $order->status,
        //     "user_id" => $order->user_id,
        //     "address_id" => $order->address_id,
        //     "payment_id" => $order->payment_id,
        // ]);

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
        $order = Order::with(['products' => function($query) {
            $query->withPivot('quantity', 'price'); 
        }])->find($id);
        $total = $order->getTotalAmount();
        $products = $order->products()->where("order_id", $id)->get();
        $address= Address::where("id",  $order->address_id)->first();
        $payment = Payment::where("transaction_id", $order->payment_id)->first();
        $billing = Billing::where("id", $payment->billing_id)->first();

        return view('/User/Order/details', compact('order', 'products', 'total', 'address','payment','billing'));
    }


    public function invoice($id)
    {
        $order = Order::with(['products' => function($query) {
            $query->withPivot('quantity', 'price'); 
        }])->find($id);
        $total = $order->getTotalAmount();
        $products = $order->products()->where("order_id", $id)->get();
        $address= Address::where("id",  $order->address_id)->first();
        $payment = Payment::where("transaction_id", $order->payment_id)->first();
        $billing = Billing::where("id", $payment->billing_id)->first();
        $card = Card::where("id", $payment->card_id)->first();

        return view('/User/Order/invoice', compact('order', 'products', 'total', 'address','payment','billing', 'card'));
    }

    public function cancel($id)
    {
        $order = Order::findOrFail( $id );
        $payment = Payment::where('user_id', Auth::user()->id);
        if($order->status === 'canceled' ){
            return redirect()->back()->with('error', "Order has already been cancelled.");
        }
        else if($order->status !== 'shipped' && $order->status !== 'delivered'){
            $order->status = 'canceled';
            $payment->status = 'refunded';
            $order->save();
            return redirect()->back()->with('success', "Order canceled!");
        }
        else{
            return redirect()->back()->with('error', "Order not eligble for cancellation. Contact customer support.");
        }
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
