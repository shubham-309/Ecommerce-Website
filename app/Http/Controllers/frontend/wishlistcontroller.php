<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class wishlistcontroller extends Controller
{
    public function wishlist()
    {
        $wishlist = Wishlist::where('user_id' , Auth::id())->get();
        return view('frontend.wishlist' , compact('wishlist'));
    }

    public function add(Requeest $req)
    {
        if(Auth::check())
        {
            $prod_id = $req->input('prod_id');
            if(Product::find($prod_id))
            {
                $wish = new Wishlist();
                $wish->prod_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => "Product Added To Wishlist"]);
            }
            else{
                return response()->json(['status' => "Product Does Not Exist"]);
            }
        }
        else{
            return response()->json(['status' => "Login To Continue"]);
        }
    }


    public function deleteitem(Request $req)
    {

        if(Auth::check())
        {

          $prod_id = $req->input('prod_id');

          if(Wishlist::where('prod_id' , $prod_id)->where('user_id' , Auth::id())->exists()){
              $wish = Wishlist::where('prod_id' , $prod_id)->where('user_id' , Auth::id())->first();
              $wish->delete();
              return response()->json(['status' => "Item Delete Successfully"]);
          }

        }

        else{
            return response()->json(['status' => "Login To Continue"]);
       }
    }

    public function wishcount()
    {
        $wishcount = Wishlist::where('user_id' , Auth::id())->count();
        return response()->json(['count' => $wishcount]);

    }

}
