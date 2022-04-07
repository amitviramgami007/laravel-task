@extends('layouts.simple.master')

@section('breadcrumb-title')
    <h3>Banner Detail</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Banners</li>
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
                                <label>Image Name:</label>
                                {{ $banner->image_name }}
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image:</label>
                                <img src="{{ asset('/storage/banners/'.$banner->image) }}" alt="banner image" style="width:80px; height:80px;" class="mt-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
