@extends('admin.master')
@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create SubCategory</h4>
                        </div>
                        <div class="card-body">
                            {{-- @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}
                            <form action="{{ route('subCategory.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-4 form-label text-right">Category Name</label>
                                    <div class="col-sm-8">
                                        <select name="category_id" id="" class="form-control">
                                            <option value="" disabled="" selected>Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-4 form-label text-right">Sub Category Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" id="name" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <label for="" class="col-sm-4 form-label">SubCategory Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right">SubCategory Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" name="image" accept=".jpg, .jpeg, .png"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right">SubCategory Status</label>
                                    <div class="col-sm-8">
                                        <label for="Publishhed"><input id="Publishhed" type="radio" name="status"
                                                value="1">
                                            Publishhed</label>
                                        <label for="Unpublished"><input id="Unpublished" type="radio" name="status"
                                                value="0">
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-outline-success" type="submit">Create New
                                            SubCategory</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
