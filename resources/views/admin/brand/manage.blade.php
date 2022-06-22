@extends('master.admin.master')
@section('title')
    Manage Brand
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">Manage Brand</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>{{$brand->description}}</td>
                                    <td><img src="{{$brand->image}}" alt="" height="50" width="50"></td>
                                    <td>{{$brand->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('brand.edit', ['id' => $brand->id])}}" class="btn btn-sm btn-success">Edit</a>
                                        <a href="" class="btn btn-sm btn-danger" onclick="event.preventDefault(); confirm('Are You Sure To Delete This Brand') ? document.getElementById('brandDeleteForm{{$brand->id}}').submit() : '' ">Delete</a>
                                        <form action="{{route('brand.delete', ['id' => $brand->id])}}" method="post" id="brandDeleteForm{{$brand->id}}">
                                            @csrf
                                        </form>
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
