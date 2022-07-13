<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Orderitem;
use Illuminate\Support\Facades\Auth;

class checkoutcontroller extends Controller
{
    public function checkout()
    {
        $old_cart = Cart::where('user_id' , Auth::id())->get();
        foreach($old_cart as $item){
            if(!Product::where('id' , $item->prod_id)->where('quantity' , '>=' , $item->prod_qty)->exists()){
                $removeitem = Cart::where('user_id' , Auth::id())->where('prod_id' , $item->prod_id)->first();
                $removeitem->delete();
            }
        }

        $cartitem = Cart::where('user_id' , Auth::id())->get();

        return view('frontend.checkout' , compact('cartitem'));
    }

    public function placeorder(Request $req)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->firstname = $req->input('firstname');
        $order->lastname = $req->input('lastname');
        $order->email = $req->input('email');
        $order->phone = $req->input('phone');
        $order->payment_mode = $req->input('payment_mode');
        $order->payment_id = $req->input('payment_id');
        $total=0;
        $cartitem_total = Cart::where('user_id', Auth::id())->get();
        foreach($cartitem_total as $item)
        {
            $total += $item->products->selling_price;
        }

        $order->total_price = $total;

        $order->save();
        $order->id;

        $cartitem = Cart::where('user_id' , Auth::id())->get();
        foreach($cartitem as $item)
        {
            OrderItem::create([
                'order_id' => $order->id ,
                'prod_id' => $item->prod_id ,
                'quantity' => $item->prod_qty,
                'price' => $item->products->selling_price,

            ]);

            $prod = Product::where('id' , $item->prod_id)->first();
            $prod->quantity = $prod->quantity - $item->prod_qty;
            $prod->update();
        }
        if(Auth::user()->phone == NULL)
        {
            $user = User::where('id' , Auth::id())->first();
            $user->name = $req->input('firstname');

            $user->email = $req->input('email');
            $user->update();
        }

        $cartitem = Cart::where('user_id' , Auth::id())->get();
        Cart::destroy($cartitem);

        if( $req->input('payment_mode') == "Paid By Razorpay"){
            return redirect('/')->with(['status' => "Order Placed Successfully"]);
        }

        return redirect('/')->with('status' , "Order Placed Successfully");

    }

    public function razorpaycheck(Request $req)
    {
        $cartitem = Cart::where('user_id' , Auth::id())->get();
        $total = 0;
        foreach($cartitem as $item)
        {
            $total += $item->products->selling_price * $item->prod_qty;
        }

        $firstname = $req->input('firstname');
        $email = $req->input('email');

        return response()->json([
            'firstname' => $firstname,
                'lastname' => $lastname,
                'email'=> $email,
                'phone' => $phone,
                'total_price' => $total
        ]);
    }
}
