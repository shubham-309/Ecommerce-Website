<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Support\Facades\File;
use App\Models\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index(){
        $product = Product::all();
        return view('admin.product.index', compact('product'));
    }

    public function add()
    {
        $category= category::all();
        return view('admin.product.add' , compact('category'));
    }

    public function insert(Request $req){

        $product = new Product();

        if($req->hasFile('image'))
        {
            $file = $req->File('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;
        }
        $product->cate_id = $req->input('cate_id');

        $product->name = $req->input('name');
        $product->slug = $req->input('slug');
        $product->small_description = $req->input('small_description');
        $product->description = $req->input('description');
        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->tax = $req->input('tax');
        $product->quantity = $req->input('quantity');
        $product->status = $req->input('status')== TRUE ? '1' : '0';
        $product->trending = $req->input('trending')== TRUE ? '1' : '0';
        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_description');
        $product->save();
        return redirect('/dashboard')->with('status', "Product Added Succesfully");


    }

    public function edit($id){
        $product = Product::find($id);
        return view('admin.product.edit' , compact('product'));
    }

    public function update(Request $req , $id)
    {
        $product = Product::find($id);

        if($req->hasFile('image'))
        {
            $path= 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req->File('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/product/',$filename);
            $product->image = $filename;
        }
         
        $product->name = $req->input('name');
        $product->slug = $req->input('slug');
        $product->small_description = $req->input('small_description');
        $product->description = $req->input('description');
        $product->original_price = $req->input('original_price');
        $product->selling_price = $req->input('selling_price');
        $product->tax = $req->input('tax');
        $product->quantity = $req->input('quantity');
        $product->status = $req->input('status')== TRUE ? '1' : '0';
        $product->trending = $req->input('trending')== TRUE ? '1' : '0';
        $product->meta_title = $req->input('meta_title');
        $product->meta_keywords = $req->input('meta_keywords');
        $product->meta_description = $req->input('meta_description');
        $product->update();
        return redirect('/products')->with('status', "Product Updated Succesfully");
        
    }

    public function delete($id){
        $product= Product::find($id);
        if($product->image)
        {
            $path= 'assets/uploads/product/'.$product->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('/products')->with('status', "Product Deleted Succesfully");
    }
}

