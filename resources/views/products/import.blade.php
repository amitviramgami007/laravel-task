@extends('layouts.simple.master')

@section('css')
@endsection

@section('breadcrumb-title')
    <h3>Product Import</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item active">Import</li>
@endsection

@section('content')

    {!! Form::open(['route' => 'products.import.store', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="import_file">Select File: <span class='text-danger'>*</span></label>
                                    {!! Form::file('import_file', ['class' => 'form-control', 'id' => 'import_file', 'style' => 'padding:3px', 'required']) !!}
                                </div>
                            </div>

                            <div class="col-md-6">
                                {!! Form::submit('Import', ['class' => 'btn btn-info']) !!}
                                <a class="btn btn-primary" href="{{ asset('files/Product_File_Templete.csv') }}"> <i class="fa fa-download"></i> Download File Template</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    {!! Form::close() !!}

@endsection

@section('script')
@endsection
