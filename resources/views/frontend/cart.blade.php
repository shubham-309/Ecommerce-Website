@extends('layouts.inc.front')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0 ">
                <a href="{{ url('/') }}" class="clr">
                    Home
                </a> /
                <a href="{{ url('cart') }}" class="clr">
                    Cart
                </a>
                /
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow ">
            @if ($cart_item->count()>0)
            <div class="card-body">
                @php
                    $total = 0;
                @endphp
                @foreach ($cart_item as $item)
                    <div class="row product_data">
                        <div class="col-md-2 my-auto">
                            <img src="{{ asset('assets/uploads/product/' . $item->products->image) }}" height="70px"
                                width="70px" alt="Image Here">
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6>{{ $item->products->name }}</h6>
                        </div>
                        <div class="col-md-2 my-auto">
                            <h6>Rs. {{ $item->products->selling_price }}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                            @if ($item->products->quantity >= $item->prod_qty)
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text changeqty dec-btn">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control text-center qty-input">
                                    <button class="input-group-text changeqty inc-btn">+</button>
                                </div>
                                @php
                                    $total += $item->products->selling_price * $item->prod_qty;
                                @endphp
                        </div>
                        <div class="col-md-2 my-auto">
                            <button class="btn btn-danger delete-cart"> <i class="fa fa-trash"></i>Remove</button>
                        </div>
                    </div>
                    @else
                    <h6>Out Of Stock</h6>
                    @endif
                @endforeach
            </div>
            <div class="card-footer">
                <h5>
                    Total Price : {{ $total }}
                    <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed To Checkout</button>
                </h5>
            </div>
            @else
                <div class="card-body text-center">
                    <h2>Your <i class="fa fa-shopping-cart "></i> Cart Is Empty</h2>
                    <a href="{{url('categories')}}" class="btn btn-outline-primary float-end">Continue Shoping</a>
                </div>
            @endif
        </div>
    </div>
@endsection
