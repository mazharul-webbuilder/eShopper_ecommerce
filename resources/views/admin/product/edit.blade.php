@extends('master.admin.master')
@section('title')
    Add Product
@endsection
@section('body')
    <section class="" style="margin-top: 8%">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title text-center text-dark">Add Product Form</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <form action="{{route('product.update', ['id' => $product->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Category</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="category_id" id="" class="form-control" onclick="getProductSubCategory(this.value);">
                                            <option>----------Select Category-------</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$product->category->id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Sub-Category</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="subcategory_id" id="subCategoryId" class="form-control">
                                            <option>----------Select Sub Category-------</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{$subCategory->id}}" {{$product->subcategory->id == $subCategory->id ? 'selected' : ''}}>{{$subCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Brand</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="brand_id" id="" class="form-control">
                                            <option>----------Select Brand-------</option>
                                            @foreach($brands as $brand)
                                                <option value="{{$brand->id}}" {{$product->brand->id == $brand->id ? 'selected' : ''}}>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Unit</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="unit_id" id="" class="form-control">
                                            <option>----------Select Unit-------</option>
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}" {{$product->unit->id == $unit->id ? 'selected' : ''}}>{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Product Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Product Code</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="code" value="{{$product->code}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Regular Price</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="regular_price" value="{{$product->regular_price}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Selling Price</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="selling_price" value="{{$product->selling_price}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Stock Amount</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="stock_amount" value="{{$product->stock_amount}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Short Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="short_description" value="{{$product->short_description}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Long Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="long_description" class="form-control">{{$product->long_description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image">
                                        <br>
                                        <img src="{{asset($product->image)}}" alt="" height="100" width="100">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Other Images</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" multiple class="form-control" name="otherImage[]">
                                        <br>
                                        @foreach($product->otherImages as $otherImage)
                                        <img src="{{asset($otherImage->image)}}" alt="" height="100" width="100">
                                        @endforeach
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Update Product"/>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function getProductSubCategory(id) {
            $.ajax({
                method: 'GET',
                url: "{{url('/get-sub-category-by-categoryID')}}",
                data: {id: id},
                dataType: 'JSON',
                success: function (response) {
                    var subCategoryId = $('#subCategoryId');
                    subCategoryId.empty();

                    var option = '<option>----------Select Sub Category-------</option>';
                    $.each(response, function (key, value) {
                        option += '<option value="' +value.id+ '">' +value.name+ '</option>';
                    })
                    subCategoryId.append(option);
                }
            });
        }
    </script>

@endsection
