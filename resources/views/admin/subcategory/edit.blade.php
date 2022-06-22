@extends('master.admin.master')
@section('title')
    Update SubCategory
@endsection
@section('body')
    <section class="" style="margin-top: 8%">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title text-center text-dark">Update SubCategory Form</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <form action="{{route('subCategory.update', ['id' => $subcategory->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Category Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="category_id" id="" class="form-control">
                                            <option>-------Select Category--------</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" {{$subcategory->category->id == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">SubCategory Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{$subcategory->name}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control">{{$subcategory->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image">
                                        <br>
                                        <img src="{{asset($subcategory->image)}}" alt="" height="100" width="200">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Update New SubCategory"/>
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
