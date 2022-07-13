@extends('layouts.admin')

@section('title')
    Orders
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4> Orders History</h4>
                        <a href="{{url('Orders')}}" class="btn btn-warning float-end" >New Orders</a>
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
                                           <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary">View</a>
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
