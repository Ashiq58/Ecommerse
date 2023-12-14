@extends('admin.master')
@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Create Product</h4>
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
                            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-3 form-label text-right">Category Name</label>
                                    <div class="col-sm-3">
                                        <select name="category_id" id="categoryId" class="form-control">
                                            <option value="" disabled="" selected>Select a Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="name" class="col-sm-3 form-label text-right">Sub Category Name</label>
                                    <div class="col-sm-3">
                                        <select name="sub_category_id" id="subCategoryId" class="form-control">
                                            <option value="" disabled="" selected>Select a SubCategory</option>
                                            @foreach ($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-3 form-label text-right">Brand</label>
                                    <div class="col-sm-3">
                                        <select name="brand_id" id="" class="form-control">
                                            <option value="" disabled="" selected>Select a Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="name" class="col-sm-3 form-label text-right">Unit</label>
                                    <div class="col-sm-3">
                                        <select name="unit_id" id="" class="form-control">
                                            <option value="" disabled="" selected>Select a Brand</option>
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Regular Price</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="regular_price" id="regular_price" class="form-control">
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-sm-3 form-label text-right">Selling Price</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="selling_price" id="selling_price" class="form-control">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <label for="" class="col-sm-3 form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Short
                                        Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="short_description" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Long
                                        Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="long_description" id="" cols="30" rows="4" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Product Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="image" accept=".jpg, .jpeg, .png"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Product Sub Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="sub_image[]" accept=".jpg, .jpeg, .png"
                                            class="form-control-file" multiple>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Product Status</label>
                                    <div class="col-sm-9">
                                        <label for="Publishhed"><input id="Publishhed" type="radio" name="status"
                                                value="1">
                                            Publishhed</label>
                                        <label for="Unpublished"><input id="Unpublished" type="radio" name="status"
                                                value="0">
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-outline-success" type="submit">Create New
                                            Product</button>
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
@section('custom-js')
    <script>
        $(document).on('change', '#categoryId', function() {
            var categoryId = $(this).val();

            $.ajax({
                url: "{{ url('getSubcategory_By_category') }}" + "/" + categoryId,
                method: "GET",
                dataType: "JSON",
                Data: {
                    id: categoryId
                },
                success: function(response) {
                    var option = '';
                    option += ' <option value="" disabled="" selected>Select a SubCategory</option>';
                    $.each(response, function(key, value) {
                        option += ' <option value="' + value.id + '">' + value.name +
                            '</option>';
                    })
                    $('#subCategoryId').empty().append(option);

                },
                error: function(e) {

                }
            })
        });
    </script>
@endsection
