@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            Edit/Update Category
        </h4>
    </div>
    <div class="card-body">
       <form action="{{url('update-catagory/'.$category->id)}}" method='post'>
           @csrf
           @method('put')
           <div class="row">
               <div class="col-md-6 mb-3">
                   <label for="">
                       NAME
                   </label>
                   <input type="text" name="name" value= "{{ $category->name }}" class="form-control" id="">
               </div>
               <div class="col-md-6 mb-3">
                   <label for="">
                       SLUG
                   </label>
                   <input type="text" name="slug" value= "{{ $category->slug }}" class="form-control" id="">
               </div>
              
               
               <div class="col-md-12 mb-3">

               <label for="">
                   Description
               </label>

               <textarea name="description"  rows="3" class="form-control">
               {{ $category->description }}
               </textarea>

               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Status
                   </label>
                   <input type="checkbox" {{ $category->status ==1 ? 'checked' : '' }} name="status">
               </div>

               <div class="col-md-6 mb-3">
                   <label for="">
                       Popular
                   </label>
                   <input type="checkbox" {{ $category->popular ==1 ? 'checked' : '' }} name="popular">
               </div>

               <div class="col-md-12 mb-3">
                   <label for="">
                       Meta Title
                   </label>
                   <input type="text" name="meta_title" value= "{{ $category->meta_title }}" class="form-control" >

               </div>

              

               <div class="col-md-12 mb-3">

               <label for="">
                   Meta Description
               </label>

               <textarea name="meta_description"  rows="3" class="form-control">
               {{ $category->meta_description }}
                   
               </textarea>

               </div>

                <div class="col-md-12 mb-3">

               <label for="">
                   Meta Keyword
               </label>

               <textarea name="meta_keywords"  rows="3" class="form-control">
               {{ $category->meta_keywords }}
               </textarea>

               </div>

               @if($category->image )
               <img src="asset('assets/uploads/catagory/'.$category->image)" alt="">
               @endif
               <div class="col-md-12 mb-3">

               <input type="file" name="image" class="form-control"> 

               </div>

               <div class="col-md-12 mb-3">

               <button type="submit" class="btn btn-primary">submit</button>
               </div>

               
               

               
           </div>
       </form>
    </div>
</div>

@endsection