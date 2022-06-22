@extends('master.admin.master')
@section('title')
     Product Detail
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center text-secondary">{{$product->name}} Detail</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Name</th>
                                    <td>{{$product->name}}</td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td>{{$product->category->name}}</td>
                                </tr>
                                <tr>
                                    <th>Sub Category</th>
                                    <td>{{$product->subcategory->name}}</td>
                                </tr>
                                <tr>
                                    <th>Brand</th>
                                    <td>{{$product->brand->name}}</td>
                                </tr>
                                <tr>
                                    <th>Unit</th>
                                    <td>{{$product->unit->name}}</td>
                                </tr>
                                <tr>
                                    <th>Code</th>
                                    <td>{{$product->code}}</td>
                                </tr>
                                <tr>
                                    <th>Regular Price</th>
                                    <td>{{$product->regular_price}}</td>
                                </tr>
                                <tr>
                                    <th>Selling Price</th>
                                    <td>{{$product->selling_price}}</td>
                                </tr>
                                <tr>
                                    <th>Stock Amount</th>
                                    <td>{{$product->stock_amount}}</td>
                                </tr>
                                <tr>
                                    <th>Short Description</th>
                                    <td>{{$product->short_description}}</td>
                                </tr>
                                <tr>
                                    <th>Long Descripiton</th>
                                    <td>{{$product->long_description}}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td><img src="{{asset($product->image)}}" alt="" height="100" width="100"></td>
                                </tr>
                                <tr>
                                    <th>Other Images</th>
                                    <td>
                                        @foreach($product->otherImages as $otherImage)
                                            <img src="{{asset($otherImage->image)}}" alt="" height="100" width="100">
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
