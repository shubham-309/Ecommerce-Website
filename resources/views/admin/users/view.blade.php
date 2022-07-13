@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                             Users Details
                             <a href="{{url('Users')}}" class="btn btn-primary float-right btn-sm">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-4 mt-3 ">
                                <label for="">Role</label>
                                 <div class="p-2 border">
                                     {{$user->role_as == '0' ? 'User' : 'Admin'}}
                                 </div>

                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="">First Name</label>
                                 <div class="p-2 border">
                                     {{$user->name}}
                                 </div>

                            </div>

                            <div class="col-md-4 mt-3">
                                <label for="">Last Name</label>
                                 <div class="p-2 border">
                                     {{$user->lastname}}
                                 </div>
                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="">Email</label>
                                     <div class="p-2 border">
                                         {{$user->email}}
                                     </div>

                                </div>

                                <div class="col-md-4 mt-3">
                                    <label for="">Phone No.</label>
                                     <div class="p-2 border">
                                         {{$user->phone}}
                                     </div>

                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
