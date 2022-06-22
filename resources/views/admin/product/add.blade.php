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
                            <form action="{{route('product.create')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Category</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="category_id" id="" class="form-control" onclick="getProductSubCategory(this.value);">
                                            <option>----------Select Category-------</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
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
                                            <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
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
                                                <option value="{{$brand->id}}">{{$brand->name}}</option>
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
                                                <option value="{{$unit->id}}">{{$unit->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Product Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Product Code</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="code">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Regular Price</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="regular_price">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Selling Price</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="selling_price">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Stock Amount</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="stock_amount">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Short Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="short_description">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Long Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="long_description" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Other Images</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" multiple class="form-control" name="otherImage[]">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Create New Product"/>
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
