@extends('layouts.inc.front')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($product as $item)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                        <a href="{{ url('categories/' . $category->slug . '/' . $item->slug) }}" class="clr">
                            <img class="img1" src="{{ asset('assets/uploads/product/' . $item->image) }}" alt="Product Image">
                            <div class="card-body">
                                <h5>{{ $item->name }}</h5>
                                <span class="float-start">{{ $item->selling_price }}</span>
                                <span class="float-end"><s>{{ $item->original_price }}</s></span>

                            </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
