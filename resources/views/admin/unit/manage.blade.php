@extends('master.admin.master')
@section('title')
    Manage Unit
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">Manage Unit</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($units as $unit)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$unit->name}}</td>
                                        <td>{{$unit->description}}</td>
                                        <td>{{$unit->status == 1 ? 'Available' : 'Not Available'}}</td>
                                        <td>
                                            <a href="{{route('unit.edit', ['id' => $unit->id])}}" class="btn btn-success btn-sm">Edit</a>
                                            <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete this unit?') ? document.getElementById('unitDeleteForm{{$unit->id}}').submit() : '' ">Delete</a>
                                            <form action="{{route('unit.delete', ['id' => $unit->id])}}" method="post" id="unitDeleteForm{{$unit->id}}">
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
