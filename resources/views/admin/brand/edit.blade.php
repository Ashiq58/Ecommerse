@extends('admin.master')
@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-10 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update brand</h4>
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
                            <form action="{{ route('brand.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="brand_id" value="{{ $brand->id }}">
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-4 form-label text-right">Brand Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" id="name" value="{{ $brand->name }}"
                                            class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <label for="" class="col-sm-4 form-label">Brand Description</label>
                                    <div class="col-sm-8">
                                        <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $brand->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right">Brand Image</label>
                                    <div class="col-sm-8">
                                        <img src="{{ asset($brand->image) }}" alt=""
                                            style="height: 60px;width:80px">
                                        <input type="file" name="image" accept=".jpg, .jpeg, .png"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right">Brand Status</label>
                                    <div class="col-sm-8">
                                        <label for="Publishhed"><input id="Publishhed" type="radio" name="status"
                                                {{ $brand->status == 1 ? 'checked' : '' }} value="1">
                                            Publishhed</label>
                                        <label for="Unpublished"><input id="Unpublished" type="radio" name="status"
                                                {{ $brand->status == 0 ? 'checked' : '' }} value="0">
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-4 form-label text-right"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-outline-success" type="submit">Update Brand</button>
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
