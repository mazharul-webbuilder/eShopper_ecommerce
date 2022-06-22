@extends('master.front.master')
@section('title')
    Customer Register
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="main-div shadow px-5 py-5">
                        <h3 class="text-center text-dark mb-4">Registration</h3>
                        <form action="{{route('customer.new.register')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Name</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" name="name" placeholder="Full Name">

                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Email</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="email" class="form-control" name="email" placeholder="Email">

                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Phone Number</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="number" class="form-control" name="mobile" placeholder="Phone Number">

                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Address</label>
                                </div>
                                <div class="col-md-9">
                                    <textarea name="address" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Password</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                    <label for="" class="form-label">Photo</label>
                                </div>
                                <div class="col-md-9">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-success" value="Register">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
