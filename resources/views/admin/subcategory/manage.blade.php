@extends('master.admin.master')
@section('title')
    Manage SubCategory
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">Manage SubCategory</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($subCategories as $subCategory)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$subCategory->name}}</td>
                                    <td>{{$subCategory->category->name}}</td>
                                    <td>{{$subCategory->description}}</td>
                                    <td><img src="{{asset($subCategory->image)}}" alt="" height="50" width="50"></td>
                                    <td>{{$subCategory->status == 1 ? 'Published' : 'Unpublished'}}</td>
                                    <td>
                                        <a href="{{route('subCategory.edit', ['id' => $subCategory->id])}}" class="btn btn-primary">Edit</a>
                                        <a href="" class="btn btn-danger" onclick="event.preventDefault(); confirm('Are you Sure?') ?  document.getElementById('subCategoryDeleteForm{{$subCategory->id}}').submit() : '' ">Delete</a>
                                        <form action="{{route('subCategory.delete', ['id' => $subCategory->id])}}" method="post" id="subCategoryDeleteForm{{$subCategory->id}}">@csrf</form>
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
