@extends('master.admin.master')
@section('title')
    Add Unit
@endsection
@section('body')
    <section class="" style="margin-top: 8%">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title text-center text-dark">Add Unit Form</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('unit.create')}}" method="POST" enctype="multipart/form-data">
                                <p class="text-center text-success">{{Session::get('message')}}</p>
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Unit Name</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="name">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Description</label>
                                    </div>
                                    <div class="col-md-9">
                                        <textarea name="description" class="form-control"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3">

                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-primary" value="Create New Unit"/>
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
