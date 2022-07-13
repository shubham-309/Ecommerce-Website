<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;


class categorycontroller extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.catagory.index', compact('category'));
    }

    public function add()
    {
        return view('admin.catagory.add');
    }

    public function insert(Request $req)
    {
        $catagory = new category();
        

        $catagory->name = $req->input('name');
        $catagory->slug = $req->input('slug');
        $catagory->description = $req->input('description');
        $catagory->status = $req->input('status') == TRUE?'1':'0'; 
        $catagory->popular = $req->input('popular') == TRUE?'1':'0'; 
        if($req->hasFile('image'))
        {
            $file = $req->File('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/catagory/',$filename);
            $category->image = $filename;
        }
        $catagory->meta_title = $req->input('meta_title');
        $catagory->meta_description = $req->input('meta_description');
        $catagory->meta_keywords = $req->input('meta_keywords');
        $catagory->save();
        return redirect('/category')->with('status', "Category Added Succesfully");
        
        


    }

    public function edit($id)
    {
        $category= Category::find($id);
        return view('admin.catagory.edit', compact('category'));
    }

    public function update(Request $req , $id){
        $category= Category::find($id);
        $category->name = $req->input('name');
        $category->slug = $req->input('slug');
        $category->description = $req->input('description');
        $category->status = $req->input('status') == TRUE?'1':'0'; 
        $category->popular = $req->input('popular') == TRUE?'1':'0';
        if($req->hasFile('image'))
        {
            $path= 'assets/uploads/catagory/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $req->File('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('assets/uploads/catagory/',$filename);
            $category->image = $filename;
        }
         
        $category->meta_title = $req->input('meta_title');
        $category->meta_description = $req->input('meta_description');
        $category->meta_keywords = $req->input('meta_keywords');
        $category->update();
        return redirect('/category')->with('status', "Category Updated Succesfully"); 
    }

    public function delete($id){
        $category= Category::find($id);
        if($category->image)
        {
            $path= 'assets/uploads/catagory/'.$category->image;
            if(File::exists($path)){
                File::delete($path);
            }
        }
        $category->delete();
        return redirect('/category')->with('status', "Category Deleted Succesfully");
    }
}
