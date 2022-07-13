@extends('layouts.inc.front')

@section('title')
    My Courses
@endsection

@section('content')
<div class="container">
     <div class="row">
         <div class="col-md-12 mt-3">
             <div class="card">
                 <div class="card-header">
                     <h4>My Orders</h4>
                 </div>
                 <div class="card-body">
                    <table class="table-bordered table">
                        <thead><tr>
                         <th>Order Date</th>
                         <th>Total</th>
                       </tr>
                           </thead>
                           <tbody>
                               @foreach ($orders as $item )
                                <tr>
                                    <td>
                                        {{date('d-m-y' , strtotime($item->created_at)) }}
                                    </td>
                                    <td>
                                        {{$item->total_price}}
                                    </td>
                                    <td>
                                        <a href="{{url('view-order/'.$item->id)}}" class="btn btn-primary">View</a>
                                    </td>
                                </tr>

                               @endforeach
                           </tbody>
                    </table>
                 </div>
             </div>
         </div>
     </div>
</div>
@endsection
