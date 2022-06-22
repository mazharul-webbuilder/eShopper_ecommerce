@extends('master.admin.master')
@section('title')
    Edit Order
@endsection
@section('body')
    <section class="" style="margin-top: 8%">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow">
                        <div class="card-header">
                            <h3 class="card-title text-center text-dark">Update Order</h3>
                        </div>
                        <div class="card-body">
                            <p class ="text-center text-success">{{Session::get('message')}}</p>
                            <form action="{{route('order.update', ['id' => $order->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Order Total</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="order_total" value="{{$order->order_total}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label"> Delivery Address</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" class="form-control" name="delivery_address" value="{{$order->delivery_address}}">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Order Status</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="order_status" id="" class="form-control">
                                            <option>-------Order Status--------</option>
                                                <option value="Pending" {{$order->order_status == 'Pending' ? 'selected' : ''}}>Pending</option>
                                                <option value="Process">Process</option>
                                                <option value="Complete">Complete</option>
                                                <option value="Cancel">Cancel</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Payment Amount</label>
                                    </div>
                                    <div class="col-md-9">
                                        <input type="number" class="form-control" name="payment_amount" value="{{$order->payment_amount}}">
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Payment Status</label>
                                    </div>
                                    <div class="col-md-9">
                                        <select name="payment_status" id="" class="form-control">
                                            <option>-------Payment Status--------</option>
                                            <option value="Pending" {{$order->payment_status == 'Pending' ? 'selected' : ''}}>Pending</option>
                                            <option value="Complete">Complete</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success" value="Update">
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
