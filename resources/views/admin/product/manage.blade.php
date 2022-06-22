@extends('master.admin.master')
@section('title')
    Manage Product
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">Manage Product</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>SubCategory</th>
                                    <th>Brand</th>
                                    <th>Unit</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->subcategory->name}}</td>
                                    <td>{{$product->brand->name}}</td>
                                    <td>{{$product->unit->name}}</td>
                                    <td>{{$product->short_description}}</td>
                                    <td>{{number_format($product->selling_price)}}.Tk</td>
                                    <td>{{$product->stock_amount}}</td>
                                    <td>
                                        <img src="{{asset($product->image)}}" alt="" height="50" width="50">
                                    </td>
                                    <td>{{$product->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-info btn-sm">D</a>
                                        <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm">E</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
