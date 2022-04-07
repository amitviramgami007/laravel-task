@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')

    <main id="main">
        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <div class="d-flex justify-content-between align-items-center">
                    <h2>Products</h2>
                    <ol>
                        <li><a href="{{ route('frontend') }}">Home</a></li>
                        <li>Products</li>
                    </ol>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            {!! Form::open(['route' => 'frontend-products.import', 'method'=>'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card col-md-6">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="import_file">Select File: <span class='text-danger'>*</span></label>
                                            {!! Form::file('import_file', ['class' => 'form-control', 'id' => 'import_file', 'style' => 'padding:3px', 'required']) !!}
                                            {!! Form::submit('Import', ['class' => 'mt-2 btn btn-info']) !!}
                                            <a class="mt-2 btn btn-primary" href="{{ asset('files/Product_File_Templete.csv') }}"> <i class="fa fa-download"></i> Download File Template</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
        </section><!-- End Services Section -->
    </main><!-- End #main -->
@endsection

@section('script')
@endsection
