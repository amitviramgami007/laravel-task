@extends('layouts.simple.master')

@section('css')
@endsection

@section('breadcrumb-title')
    <h3>Banner Create</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Banners</li>
    <li class="breadcrumb-item active">Create</li>
@endsection

@section('content')

    {!! Form::open(array('route' => 'banners.store', 'method'=>'POST', 'enctype' => 'multipart/form-data')) !!}
        @include('banners.form')
    {!! Form::close() !!}

@endsection

@section('script')
@endsection
