@extends('master.front.master')
@section('title')
{{Session::get('customerName')}} | - Dashboard - |
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center text-dark">{{Session::get('customerName')}} Your last Orders</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>OrderID</th>
                                    <th>Total Order</th>
                                    <th>Your Customer ID</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$order->id}}</td>
                                    <td>Tk. {{number_format($order->order_total)}}</td>
                                    <td>{{Session::get('customerId')}}</td>
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
