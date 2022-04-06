@extends('layouts.simple.master')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('breadcrumb-title')
    <h3>Products</h3>
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item">Products</li>
    <li class="breadcrumb-item">List</li>
@endsection

@section('content')
    <div class="container-fluid">
        @include('layouts.buttons.create-btn', [$createRoute])
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered display datatables data-table">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Image</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/datatable-global-setting.js') }}"></script>
    <script src="{{ asset('js/delete-btn.js') }}"></script>
    <script>
        $(function ()
        {
            var table = $('.data-table').DataTable(
            {
                ajax: "{{ route('products.index') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'product_name', name: 'product_name'},
                    {data: 'price', name: 'price'},
                    {data: 'image', name: 'image'},
                    {data: 'created_by', name: 'created_by'},
                    {data: 'updated_by', name: 'updated_by'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>
@endsection
