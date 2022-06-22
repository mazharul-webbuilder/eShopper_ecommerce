@extends('master.admin.master')
@section('title')
    Order Detail
@endsection
@section('body')
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center text-secondary">Order Detail</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Customer ID</th>
                                    <td>{{$order->customer->id}}</td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td>Tk. {{number_format($order->order_total)}}</td>
                                </tr>
                                <tr>
                                    <th>Tax Amount</th>
                                    <td>Tk. {{number_format($order->tax_amount)}}</td>
                                </tr>
                                <tr>
                                    <th>Shipping Amount</th>
                                    <td>Tk. {{number_format($order->shipping_amount)}}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Address</th>
                                    <td>{{$order->delivery_address}}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>{{$order->order_status}}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{$order->order_date}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>{{$order->payment_status}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Amount</th>
                                    <td>{{$order->payment_amount}}</td>
                                </tr>
                                <tr>
                                    <th>Payment Date</th>
                                    <td>{{$order->payment_date}}</td>
                                </tr>
                                <tr>
                                    <th>Delivery Date</th>
                                    <td>{{$order->delivery_date}}</td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td>{{$order->transaction_id}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center text-secondary">Order Basic Info</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                <tr>
                                    <th>Customer ID</th>
                                    <td>{{$order->customer->id}}</td>
                                </tr>
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{$order->customer->name}}</td>
                                </tr>
                                <tr>
                                    <th>Customer Email</th>
                                    <td>{{$order->customer->email}}</td>
                                </tr>
                                <tr>
                                    <th>Customer Mobile</th>
                                    <td>{{$order->customer->mobile}}</td>
                                </tr>
                                <tr>
                                    <th>Customer Address</th>
                                    <td>{{$order->customer->address}}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="" style="margin-top: 5%">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="text-center text-secondary">Order Product Info</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-hover table-bordered">
                                @foreach($order->orderDetails as $orderDetail)
                                    <tr>
                                        <th colspan="2"><h6 class="text-center">Product ({{$orderDetail->product_name}}) Detail Info</h6></th>
                                    </tr>
                                <tr>
                                    <th>Order Detail Id</th>
                                    <td>{{$orderDetail->id}}</td>
                                </tr>
                                    <tr>
                                        <th>Order Id</th>
                                        <td>{{$orderDetail->order_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Id</th>
                                        <td>{{$orderDetail->product_id}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Name</th>
                                        <td>{{$orderDetail->product_name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Price</th>
                                        <td>Tk. {{number_format($orderDetail->product_price)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Product Quaantity</th>
                                        <td>{{$orderDetail->product_quantity}}</td>
                                    </tr>

                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
