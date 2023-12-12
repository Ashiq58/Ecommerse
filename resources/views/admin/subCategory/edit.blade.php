@extends('admin.master')
@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Sub-subCategory</h4>
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
                            <form action="{{ route('subCategory.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="subCategory_id" value="{{ $subCategory->id }}">
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-4 form-label text-right">Category Name</label>
                                    <div class="col-sm-8">
                                        <select name="category_id" id="" class="form-control">
                                            @foreach ($categories as $category)
                                                @if ($category->id == $subCategory->category_id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-4 form-label text-right">Sub-subCategory
                                        Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" id="name" value="{{ $subCategory->name }}"
                                            class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <label for="" class="col-sm-4 form-label">subCategory Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $subCategory->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right">subCategory Image</label>
                                    <div class="col-sm-8">
                                        <img src="{{ asset($subCategory->image) }}" alt=""
                                            style="height: 60px;width:80px">
                                        <input type="file" name="image" accept=".jpg, .jpeg, .png"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right">subCategory Status</label>
                                    <div class="col-sm-8">
                                        <label for="Publishhed"><input id="Publishhed" type="radio" name="status"
                                                {{ $subCategory->status == 1 ? 'checked' : '' }} value="1">
                                            Publishhed</label>
                                        <label for="Unpublished"><input id="Unpublished" type="radio" name="status"
                                                {{ $subCategory->status == 0 ? 'checked' : '' }} value="0">
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-outline-success" type="submit">Update subCategory</button>
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
