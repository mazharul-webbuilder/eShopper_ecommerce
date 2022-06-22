@extends('master.admin.master')
@section('title')
    Manage Category
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">Manage Category</h3>
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
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->description}}</td>
                                    <td>
                                        <img src="{{asset($category->image)}}" alt="" height="50" width="50">
                                    </td>
                                    <td>{{$category->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-primary btn-sm">Edit</a>
                                        <a href="" onclick="event.preventDefault(); confirm('Are You Sure to Delete this Category') ? document.getElementById('categoryDeleteForm{{$category->id}}').submit() : '' ;" class="btn btn-danger btn-sm">Delete</a>
                                        <form action="{{route('category.delete', ['id' => $category->id])}}" method="post" id="categoryDeleteForm{{$category->id}}">
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
