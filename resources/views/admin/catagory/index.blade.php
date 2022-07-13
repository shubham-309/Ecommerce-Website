@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>
            Category Page
        </h4>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($category as $item)
                <tr>
                    <td>{{ $item->id}}</td>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->description}}</td>
                    <td>
                        <img src="{{asset('assets/uploads/catagory/'.$item->image)}}" class='cate-img' alt="Image Here">
                    </td>
                    <td>
                        <a href="{{url('edit-catagory/'.$item->id)}}" class="btn btn-primary edit">Edit</a>
                        <a href="{{url('delete-catagory/'.$item->id)}}" class="btn btn-danger delete">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection