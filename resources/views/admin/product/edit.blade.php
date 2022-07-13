@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            Add Product
        </h4>
    </div>
    <div class="card-body">
       <form action="{{url('update-product/'.$product->id)}}" method='post' enctype="multipart/form-data">
           @csrf
           @method('put')
           <div class="row">
               <div class="col-md-12 mb-3">
                   <label for="">Category</label>
               <select class="form-select"  >
                    <option value="">{{$product->category->name}}</option>
                </select>
               </div>
               <div class="col-md-6 mb-3">
                   <label for="">
                       NAME
                   </label>
                   <input type="text" name="name" class="form-control" value="{{$product->name}}">
               </div>
               <div class="col-md-6 mb-3">
                   <label for="">
                       SLUG
                   </label>
                   <input type="text" name="slug" value="{{$product->slug}}" class="form-control" id="">
               </div>
              
               
               <div class="col-md-12 mb-3">

               <label for="">
                    Small Description
               </label>

               <textarea name="small_description"   rows="3" class="form-control">
               {{$product->small_description}}
               </textarea>

               </div>

               <div class="col-md-12 mb-3">

               <label for="">
                    Description
               </label>

               <textarea name="description"  rows="3" class="form-control">
               {{$product->description}}
               </textarea>

               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Original Price
                   </label>
                   <input type="number" name="original_price" value="{{$product->original_price}}">
               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Selling Price
                   </label>
                   <input type="number" name="selling_price" value="{{$product->selling_price}}" >
               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Tax
                   </label>
                   <input type="number" name="tax" value="{{$product->tax}}">
               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Quantity
                   </label>
                   <input type="number" name="quantity" value="{{$product->quantity}}">
               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Status
                   </label>
                   <input type="checkbox" {{ $product->status ==1 ? 'checked': ''}} name="status">
               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Trending
                   </label>
                   <input type="checkbox" {{ $product->trending == 1? 'checked' : ''  }} name="trending">
               </div>

               <div class="col-md-12 mb-3">
                   <label for="">
                       Meta Title
                   </label>
                   <input type="text" name="meta_title" value="{{$product->meta_title}}" class="form-control" >

               </div>

              

               <div class="col-md-12 mb-3">

               <label for="">
                   Meta Description
               </label>

               <textarea name="meta_description"  rows="3" class="form-control">
               {{$product->meta_description}}
               </textarea>

               </div>

                <div class="col-md-12 mb-3">

               <label for="">
                   Meta Keyword
               </label>

               <textarea name="meta_keywords"   rows="3" class="form-control">
               {{$product->meta_keywords}}
               </textarea>

               </div>
               @if($product->image)
               <img src="{{asset('assets/uploads/product/'. $product->image)}}" alt="">
               @endif
               <div class="col-md-12 mb-3">

               <input type="file" name="image" class="form-control"> 

               </div>

               <div class="col-md-12 mb-3">

               <button type="submit" class="btn btn-primary">Update</button>
               </div>

               
               

               
           </div>
       </form>
    </div>
</div>

@endsection