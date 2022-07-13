<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\category;
use Illuminate\Database\Eloquent\Builder;

class frontcontroller extends Controller
{
    public function index()
    {
        $product = Product::where('trending' , '1')->take(10)->get();
        $category = category::where('popular' , '1')->take(10)->get();
        return view('frontend.index' , compact('product' , 'category' ));
    }

    public function category()
    {
        $category = category::where('status' , '1')->get();
        return view('frontend.category' , compact('category'));
    }

   public function viewcategory($slug)
    {
        if(category::where('slug' , $slug)->exists()){
           $category = category::where('slug' , $slug)->first();
           $product = Product::where('cate_id' , $category->id)->where('status' , '0')->get();
           return view('frontend.products.index' , compact('category' , 'product'));
        }
        else
        {
            return redirect('/')->with('status' , "Slug Not Exist");
        }

    }

    public function productview( $cate_slug , $prod_slug)
    {
        if(category::where('slug' , $cate_slug)->exists())
        {
            if(Product::where('slug' , $prod_slug)->exists())
            {
                $prod = Product::where('slug' , $prod_slug)->first();
                return view('frontend.products.view' , compact('prod'));
            }
            else
            {
                return redirect('/')->with('status' , "The Link Is Broken ");
            }
        }
        else
        {
            return redirect('/')->with('status' , "No Such Catagory Found");
        }
    }
}
