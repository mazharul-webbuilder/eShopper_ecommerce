@extends('master.admin.master')
@section('title')
    Manage Order
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center">Manage Order</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>OrderId</th>
                                    <th>Customer Name</th>
                                    <th>Order Total</th>
                                    <th>Order Date</th>
                                    <th>Order Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->customer->name}}</td>
                                        <td>Tk. {{number_format($order->order_total)}}</td>
                                        <td>{{$order->order_date}}</td>
                                        <td>{{$order->order_status}}</td>
                                        <td>
                                            <a href="{{route('order.detail', ['id' => $order->id])}}" class="btn btn-info btn-sm">Detail</a>
                                            <a href="{{route('order.invoice', ['id' => $order->id])}}" class="btn btn-success btn-sm">Invoice</a>
                                            <a href="{{route('order.print', ['id' => $order->id])}}" class="btn btn-primary btn-sm" onclick="event.preventDefault()">Download</a>
                                            @if($order->order_status == 'Complete')
                                                <button class="btn btn-warning btn-sm" disabled>Edit</button>
                                            @else
                                                <a href="{{route('order.edit', ['id' =>$order->id])}}" class="btn btn-warning btn-sm">Edit</a>
                                            @endif
                                            @if($order->order_status == 'Process' OR $order->order_status == 'Pending')
                                                <button class="btn btn-danger btn-sm" disabled>Delete</button>
                                            @else
                                            <a href="" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are You Sure?') ? document.getElementById('deleteOrder{{$order->id}}').submit() : ''">Delete</a>
                                            <form action="{{route('order.delete', ['id' => $order->id])}}" method="post" id="deleteOrder{{$order->id}}">
                                                @csrf
                                            </form>
                                            @endif
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
