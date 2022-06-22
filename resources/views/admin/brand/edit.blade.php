@extends('master.admin.master')
@section('title')
    Update Brand
@endsection
@section('body')
    <section class="" style="margin-top: 8%">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title text-center text-dark">Update Brand Form</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('brand.update', ['id' => $brand->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <p class="text-center text-success">{{Session::get('message')}}</p>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Brand Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name" value="{{$brand->name}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control">{{$brand->description}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Image</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control" name="image">
                                        <br>
                                        <img src="{{asset($brand->image)}}" alt="" height="100" width="100">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Update New Brand"/>
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
