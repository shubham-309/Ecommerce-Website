<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class cartcontroller extends Controller
{
    public function addproduct(Request $req)
    {
        $prod_id = $req->input('prod_id');
        $prod_qty = $req->input('prod_qty');

        if(Auth::check())
        {
            $prod_check = Product::where('id',$prod_id)->first();
            if($prod_check)
            {
                if(Cart::where('prod_id' , $prod_id)->where('user_id' , Auth::id())->exists() )
                {
                    return response()->json(['status' => $prod_check->name . " Already Added To Cart"]);
                }
                else{
                $cart_item = new Cart;
                $cart_item->prod_id = $prod_id;
                $cart_item->user_id = Auth::Id();
                $cart_item->prod_qty = $prod_qty;
                $cart_item->save();
                return response()->json(['status' => $prod_check->name . " Added To Cart"]);
                }


            }
        }
        else{
             return response()->json(['status' => "Login To Continue"]);
        }

    }

    public function viewcart()
    {
        $cart_item = Cart::where('user_id' , Auth::id())->get();
        return view('frontend.cart',compact('cart_item'));
    }

    public function deleteproduct(Request $req)
    {
        if(Auth::check())
        {

          $prod_id = $req->input('prod_id');

          if(Cart::where('prod_id' , $prod_id)->where('user_id' , Auth::id())->exists()){
              $cartitem = Cart::where('prod_id' , $prod_id)->where('user_id' , Auth::id())->first();
              $cartitem->delete();
              return response()->json(['status' => "Product Delete Successfully"]);
          }

        }

        else{
            return response()->json(['status' => "Login To Continue"]);
       }
    }

    public function updatecart(Request $req)
    {
        $prod_id = $req->input('prod_id');
        $product_qty = $req->input('prod_qty');

        if(Auth::check())
        {

            if(Cart::where('prod_id' , $prod_id)->where('user_id' , Auth::id())->exists())
            {
                $cart = Cart::where('prod_id' , $prod_id)->where('user_id' , Auth::id())->get();
                $cart->prod_qty = $product_qty;
                $cart->update();
                return response()->json(['status' => "Quantity Updated"]);
            }
        }

    }


    public function cartcount()
    {
        $cartcount = Cart::where('user_id' , Auth::id())->count();
        return response()->json(['count' => $cartcount]);

    }

}
