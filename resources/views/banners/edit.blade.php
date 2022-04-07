@extends('layouts.simple.master')

@section('css')
@endsection

@section('breadcrumb-title')
    <h3>Banner Edit</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Banners</li>
    <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')

    {!! Form::model($banner, ['method' => 'PATCH', 'route' => ['banners.update', $banner->id], 'enctype' => 'multipart/form-data']) !!}
        @include('banners.form')
    {!! Form::close() !!}

@endsection

@section('script')
@endsection
