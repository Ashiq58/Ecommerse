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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Category Name</th>
                                <th>SubCategory Name</th>
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
                                <th>SubCategory Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($subCategories as $subCategory)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $subCategory->Category->name }}</td>
                                    <td>{{ $subCategory->name }}</td>
                                    <td>{{ $subCategory->description }}</td>
                                    <td>{{ $subCategory->status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        <img src="{{ asset($subCategory->image) }}" alt=""
                                            style="height: 60px;width:80px">
                                    </td>
                                    <td>
                                        <a href="{{ route('subCategory.edit', ['id' => $subCategory->id]) }}"
                                            class="btn btn-success">Edit</a>
                                        <a href="{{ route('subCategory.delete', ['id' => $subCategory->id]) }}"
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
