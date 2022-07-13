@extends('layouts.inc.front')

@section('title')
    My Courses
@endsection

@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-12 mt-3">
             <div class="card">
                 <div class="card-header bg-primary">
                     <h4 class="text-white">Orders View
                         <a href="{{url('my-orders')}}" class="btn btn-warning  float-end">Back</a>
                     </h4>
                 </div>
                 <div class="card-body">
                     <div class="row">
                         <div class="col-md-6 order-detail">
                             <hr>
                             <label for="">First Name</label>
                             <div class="border p-2">{{ $orders->firstname }}</div>
                             <label for="">Last Name</label>
                             <div class="border p-2">{{$orders->lastname}}</div>
                             <label for="">Email</label>
                             <div class="border p-2">{{$orders->email}}</div>
                             <label for="">Contact No.</label>
                             <div class="border p-2">{{$orders->phone}}</div>
                         </div>
                         <div class="col-md-6">
                            <table class="table-bordered table">
                                <thead><tr>
                                 <th>Course Name</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                                 <th>Image</th>
                               </tr>
                                   </thead>
                                   <tbody>
                                       @foreach ($orders->orderitems as $item )
                                        <tr>
                                            <td>
                                                {{$item->products->name}}
                                            </td>
                                            <td>
                                                {{$item->prod_qty}}
                                            </td>
                                            <td>
                                                {{$item->price}}
                                            </td>
                                            <td>
                                                <img src="{{asset('assets/uploads/product/' . $item->products->image)}}" width="50px;" alt="Product Image">
                                            </td>
                                        </tr>

                                       @endforeach
                                   </tbody>
                            </table>
                            <h4 class="px-2">
                                Grand Totle : <span class="float-end">Rs.{{$orders->total_price}}</span>
                            </h4>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
</div>
@endsection
