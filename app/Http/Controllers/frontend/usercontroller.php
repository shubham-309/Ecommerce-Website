<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class usercontroller extends Controller
{
    public function myorders()
    {
        $orders = Order::where('user_id' , Auth::id())->get();
        return view('frontend.orders.index' , compact('orders'));
    }

    public function view($id)
    {
        $orders = Order::where('id' , $id)->where('user_id' , Auth::id())->get()->first();
        return view('frontend.orders.view' , compact('orders'));

    }
}
