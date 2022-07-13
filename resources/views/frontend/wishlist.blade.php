@extends('layouts.inc.front')

@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0 ">
                <a href="{{ url('/') }}" class="clr">
                    Home
                </a> /
                <a href="{{ url('Wishlist') }}" class="clr">
                    Wishlist
                </a>
                /
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow product_data ">
            <div class="card-body">
                @if ($wishlist->count() > 0)
                <div class="card-body">
                    @foreach ($wishlist as $item)
                        <div class="row ">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}" height="70px"
                                    width="70px" alt="Image Here">
                            </div>
                            <div class="col-md-5 my-auto">
                                <h3>{{ $item->products->name }}</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>Rs. {{ $item->products->selling_price }}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if ($item->products->quantity >= $item->prod_qty)
                                <h6>In Stock</h6>
                                    @php
                                        $total += $item->products->selling_price * $item->prod_qty;
                                    @endphp
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-succcess addtocartbtn"> <i class="fa fa-shopping-cart"></i>Add To Cart</button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-wishlist"> <i class="fa fa-trash"></i>Remove</button>
                            </div>
                        </div>
                        @else
                        <h6>Out Of Stock</h6>
                        @endif
                    @endforeach
                </div>
                @else
                <h4>There Are No Product In Your Wishlist</h4>
                @endif
            </div>
        </div>
    </div>
@endsection
