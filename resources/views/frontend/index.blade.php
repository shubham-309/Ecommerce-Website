@extends('layouts.inc.front')

@section('title')
    Welcome To Course Joiner
@endsection

@section('content')
    @include('layouts.inc.frontendslider')


    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Featured Products</h2>
                @foreach ($product as $item)
                    <div class="col-md-4 mb-2">
                        <a href="{{url('categories/'. $item->category->slug . '/' . $item->slug)}}" class="clr">
                        <div class="card">
                                <img src="{{ asset('assets/uploads/product/' . $item->image) }}" alt="Product Image">
                                <div class="card-body">
                                    <h5>{{ $item->name }}</h5>
                                    <span class="float-start">{{ $item->selling_price }}</span>
                                    <span class="float-end"><s>{{ $item->original_price }}</s></span>

                                </div>
                        </div>
                    </a>
                    </div>
                @endforeach





            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Trending Category</h2>
                @foreach ($category as $cate)
                    <div class="col-md-4 mb-2">
                        <a href="{{ url('view-categories/' . $cate->slug) }}" class="clr">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/catagory/' . $cate->image) }}" alt="">
                                <div class="card-body">
                                    <h5>{{ $cate->name }}</h5>
                                    <p>
                                        {{ $cate->description }}
                                    </p>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
