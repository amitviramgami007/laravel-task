@extends('layouts.simple.master')

@section('css')
@endsection

@section('style')
@endsection

@section('breadcrumb-title')
    <h3>Dashboard</h3>
@endsection

@section('breadcrumb-items')
    {{-- <li class="breadcrumb-item">Dashboard</li> --}}
@endsection

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <a href="{{ route('users.index') }}"><span class="info-box-text">Users</span></a>
                            <span class="info-box-number">{{ $userCount }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fa fa-image"></i></span>
                    <div class="info-box-content">
                        <a href="{{ route('banners.index') }}"><span class="info-box-text">Banners</span></a>
                        <span class="info-box-number">{{ $bannerCount }}</span>
                    </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fa fa-shopping-bag"></i></span>
                        <div class="info-box-content">
                            <a href="{{ route('products.index') }}"><span class="info-box-text">Products</span></a>
                            <span class="info-box-number">{{ $productCount }}</span>
                        </div><!-- /.info-box-content -->
                    </div><!-- /.info-box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection

@section('script')
@endsection
