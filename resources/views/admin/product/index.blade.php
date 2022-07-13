@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            Product Page
        </h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Original Price</th>
                    <th>Selling Price</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->description}}</td>
                    <td>{{$item->original_price}}</td>
                    <td>{{$item->selling_price}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/product/'.$item->image)}}" class='cate-img' alt="Image Here">
                    </td>
                    <td>
                        <a href="{{url('edit-product/'.$item->id)}}" class="btn btn-primary edit">Edit</a>
                        <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
