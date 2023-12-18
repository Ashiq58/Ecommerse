@extends('admin.master')
@section('body')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h4>Update Product</h4>
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
                            <form action="{{ route('product.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-3 form-label text-right">Category Name</label>
                                    <div class="col-sm-3">
                                        <select name="category_id" id="categoryId" class="form-control">
                                            @foreach ($categorie as $categories)
                                                @if ($categories->id == $product->category_id)
                                                    <option value="{{ $categories->id }}" selected>{{ $categories->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="name" class="col-sm-3 form-label text-right">Sub Category Name</label>
                                    <div class="col-sm-3">
                                        <select name="sub_category_id" id="subCategoryId" class="form-control">
                                            @foreach ($subCategory as $subCategories)
                                                @if ($subCategories->id == $product->sub_category_id)
                                                    <option value="{{ $subCategories->id }}" selected>
                                                        {{ $subCategories->name }}</option>
                                                @else
                                                    <option value="{{ $subCategories->id }}">{{ $subCategories->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="name" class="col-sm-3 form-label text-right">Brand</label>
                                    <div class="col-sm-3">
                                        <select name="brand_id" id="" class="form-control">
                                            @foreach ($brand as $brands)
                                                @if ($brands->id == $product->brand_id)
                                                    <option value="{{ $brands->id }}" selected>{{ $brands->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brands->id }}">{{ $brands->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <label for="name" class="col-sm-3 form-label text-right">Unit</label>
                                    <div class="col-sm-3">
                                        <select name="unit_id" id="" class="form-control">
                                            @foreach ($unit as $units)
                                                @if ($units->id == $product->unit_id)
                                                    <option value="{{ $units->id }}" selected>{{ $units->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $units->id }}">{{ $units->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Regular Price</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="regular_price" value="{{ $product->regular_price }}"
                                            id="regular_price" class="form-control">
                                        @error('regular_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <label for="" class="col-sm-3 form-label text-right">Selling Price</label>
                                    <div class="col-sm-3">
                                        <input type="text" name="selling_price" value="{{ $product->selling_price }}"
                                            id="selling_price" class="form-control">
                                        @error('selling_price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row text-right">
                                    <label for="" class="col-sm-3 form-label">Product Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" id="name" value="{{ $product->name }}"
                                            class="form-control">
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Short
                                        Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="short_description" id="" cols="30" rows="4" class="form-control">{{ $product->short_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Long
                                        Description</label>
                                    <div class="col-sm-9">
                                        <textarea name="long_description" id="" cols="30" rows="4" class="form-control">{{ $product->long_description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Product Image</label>
                                    <div class="col-sm-9">
                                        <img src="{{ asset($product->image) }}" alt=""
                                            style="height: 60px;Width:80px">
                                        <input type="file" name="image" accept=".jpg, .jpeg, .png"
                                            class="form-control-file">
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Product Sub Image</label>
                                    <div class="col-sm-9">
                                        @foreach ($product->subImages as $subImage)
                                            <img src="{{ asset($subImage->image) }}" alt=""
                                                style="height: 60px;width:80px">
                                            {{-- <form action=" {{ route('deleteSubImage', $subImage->id) }}" method="post">
                                                @csrf
                                                <button class="btn text-danger d-flex">x</button>
                                            </form> --}}
                                        @endforeach
                                        <input type="file" name="sub_image[]" accept=".jpg, .jpeg, .png"
                                            class="form-control-file" multiple>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right">Product Status</label>
                                    <div class="col-sm-9">
                                        <label for="Publishhed"><input id="Publishhed" type="radio" name="status"
                                                {{ $product->status == 1 ? 'checked' : '' }} value="1">
                                            Publishhed</label>
                                        <label for="Unpublished"><input id="Unpublished" type="radio" name="status"
                                                {{ $product->status == 0 ? 'checked' : '' }} value="0">
                                            Unpublished</label>
                                    </div>
                                </div>
                                <div class="form-group row ">
                                    <label for="" class="col-sm-3 form-label text-right"></label>
                                    <div class="col-sm-9">
                                        <button class="btn btn-outline-success" type="submit">Update
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
                    option += '<option value="" disabled="" selected>Select a SubCategory</option>';
                    $.each(response, function(key, value) {
                        option += '<option value="' + value.id + '">' + value.name + '</option>'
                    })
                    $('#subCategoryId').empty().append(option);

                },
                error: function(e) {

                }
            })

        });
    </script>
@endsection
