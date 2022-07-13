@extends('layouts.inc.front')

@section('title')
    Checkout
@endsection

@section('content')

<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0 ">
            <a href="{{ url('/') }}" class="clr">
                Home
            </a> /
            <a href="{{ url('checkout') }}" class="clr">
                Checkout
            </a>
            /
        </h6>
    </div>
</div>


<div class="container mt-5">
    <form action="{{ url('place-order') }}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" required class="form-control firstname" id="" value="{{Auth::user()->name}}" placeholder="Enter Your First Name">
                            <span id="fname" class="text-danger"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" required class="form-control lastname" id=""  placeholder="Enter Your Last Name">
                            <span id="lname" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" required class="form-control email" id="" value="{{Auth::user()->email}}" placeholder="Enter Your Mail">
                            <span id="email" class="text-danger"></span>
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" required class="form-control phone" id=""  placeholder="Enter Your Phone Number ">
                            <span id="phone"  class="text-danger"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                   <h6> Order Details </h6>
                   <hr>
                   @if($cartitem->count() > 0)
                   <table class="table table-striped table-bordered">
                       <thead>
                           <tr>
                               <th>NAME</th>
                               <th>Quantity</th>
                               <th>Price</th>
                           </tr>

                       </thead>
                       <tbody>
                            @foreach ($cartitem as $item)
                            <tr>
                            <td>{{$item->products->name}}</td>
                            <td>{{$item->prod_qty}}</td>
                            <td>{{$item->products->selling_price}}</td>
                        </tr>
                            @endforeach
                           </tr>
                       </tbody>
                   </table>

                   <hr>
                   <input type="hidden" name="payment_mode" value="COD">
                   <button type="submit" class="btn btn-primary w-100 mt-3 float-end">Place Order </button>
                   <button type="button" class="btn btn-primary w-100 mt-3 razorpaybtn">Pay With Razorpay</button>
                    @else
                    <h4 class="text-center">No Products In Cart <i class="fa fa-shopping-cart"></i></h4>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
</div>
@endsection

