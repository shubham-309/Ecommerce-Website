@extends('layouts.inc.front')

@section('title')
    {{ $prod->name }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('categories')}}" class="clr">
                Collections
            </a> /
            <a href="{{url('view-categories/' . $prod->category->slug)}}" class="clr">
                {{ $prod->category->name }}
                </a>
                /
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img class="img1" src="{{ asset('assets/uploads/product/' . $prod->image) }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $prod->name }}
                            @if ($prod->trending == '1')
                                <label style="font-size: 16px;"
                                    class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3">Original Price: <s>Rs {{ $prod->original_price }}</s></label>
                        <label class="fw-bold">Selling Price: Rs {{ $prod->selling_price }}</label>
                        <p class="mt-3">
                            {!! $prod->small_description !!}
                        </p>
                        <hr>
                        @if ($prod->quantity > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out Of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-2">
                                <label for="quantity">Quantity</label>
                                <div class="input-group text-center mb-3">
                                    <input type="hidden" class="prod_id" value="{{$prod->id}}">
                                    <button class="input-group-text chanheqty dec-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control qty-input">
                                    <button class="input-group-text changeqty inc-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <br>
                                @if ($prod->quantity > 0)
                            <button type="button" class="btn btn-primary me-3 addtocartbtn float-start">Add To Cart <i
                                class="fa fa-shopping-cart"></i></button>

                                <button type="button" class="btn btn-success addtowishlist me-3 float-start">Add To Wishlist <i
                                        class="fa fa-heart"></i></button>
                                        @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

