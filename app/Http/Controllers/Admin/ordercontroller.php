<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ordercontroller extends Controller
{
    public function index()
    {
        $orders =  Order::where('status','0')->get();
        return view('admin.orders.index' , compact('orders'));
    }

    public function view($id)
    {
        $orders =  Order::where('id','$id')->first();
        return view('admin.orders.view' , compact('orders'));
    }

    public function updateorder(Request $req ,$id)
    {
        $orders =  Order::find($id);
        $orders->status = $req->input('Order_status');
        $orders->update();
        return redirect('Orders')->with('status', "Order Updated Succesfully");
    }

    public function orderhistory()
    {
        $orders = Order::where('status' , '1')->get();
        return view('admin.orders.history' , compact('orders'));
    }
}
