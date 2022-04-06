@extends('layouts.simple.master')

@section('css')
@endsection

@section('breadcrumb-title')
    <h3>Product Create</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')

    {!! Form::open(array('route' => 'products.store', 'method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
        @include('products.form')
    {!! Form::close() !!}

@endsection

@include('products.script')
