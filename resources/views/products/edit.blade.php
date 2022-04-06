@extends('layouts.simple.master')

@section('css')
@endsection

@section('breadcrumb-title')
    <h3>Product Edit</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

    {!! Form::model($product, ['method' => 'PATCH', 'route' => ['products.update', $product->id], 'enctype' => 'multipart/form-data']) !!}
        @include('products.form')
    {!! Form::close() !!}

@endsection

@include('products.script')
