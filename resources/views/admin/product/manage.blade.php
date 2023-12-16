@extends('admin.master')

@section('body')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-center"> Sub-Category Table</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Sub-Category Table</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: small;">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>Sub-Ct Name</th>
                                <th>Brand Name</th>
                                <th>Unit</th>
                                <th>product Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <th>Sl</th>
                                <th>Category Name</th>
                                <th>Sub-Ct Name</th>
                                <th>Brand Name</th>
                                <th>Unit</th>
                                <th>product Name</th>
                                <th>Description</th>
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
                                    <td>{{ $product->short_description }}</td>
                                    <td>{{ $product->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <img src="{{ asset($product->image) }}" alt=""
                                            style="height: 60px;width:80px">
                                    </td>
                                    <td>
                                        <a href="{{ route('product.edit', ['id' => $product->id]) }}"
                                            class="btn btn-success" style="font-size: x-small;width:45px;height:25px">Edit</a>
                                        <a href="{{ route('product.delete', ['id' => $product->id]) }}"
                                            class="btn btn-danger" onclick="return confirm('are you Sure?')" style="font-size: x-small;width:45px;height:25px">Delete</a>
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
