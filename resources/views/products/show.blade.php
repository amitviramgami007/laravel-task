@extends('layouts.simple.master')

@section('breadcrumb-title')
    <h3>Product Detail</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item active">Detail</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Product Name:</label>
                                {{ $product->product_name }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Price:</label>
                                {{ $product->price }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Image:</label>
                                <img src="{{ asset('uploads/'.$product->image) }}" alt="product image" style="width:80px; height:80px;" class="mt-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
