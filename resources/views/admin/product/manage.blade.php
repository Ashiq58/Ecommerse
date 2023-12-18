@extends('admin.master')

@section('body')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center"> ProductTable</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">ProductTable</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: small">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>product</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Product Name</th>
                                <th>Regular Price</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Category</th>
                                <th>Sub Category</th>
                                <th>Brand</th>
                                <th>Unit</th>
                                <th>Product Name</th>
                                <th>Regular Price</th>
                                <th>Selling Price</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->Category->name }}</td>
                                    <td>{{ $product->subCategory->name }}</td>
                                    <td>{{ $product->Brand->name }}</td>
                                    <td>{{ $product->Unit->name }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->regular_price }}</td>
                                    <td>{{ $product->selling_price }}</td>
                                    <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <img src="{{ asset($product->image) }}" alt=""
                                            style="height: 60px;width:80px">
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ route('product.delete', ['id' => $product->id]) }}"
                                            class="btn btn-danger" onclick="return confirm('are you Sure?')">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
