@extends('master.front.master')
@section('title')
    Checkout
@endsection
@section('body')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Checkout</p>
                <p class="text-center text-success">{{Session::get('message')}}</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-4">Checkout Info</h4>
                    <form action="{{route('new-order')}}" method="POST">
                        @csrf
                        <div class="row">
                            @if(!Session::get('customerId'))
                                <div class="col-md-12 form-group">
                                    <label>Full Name</label>
                                    <input class="form-control" type="text" placeholder="Full Name" name="name">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="email" placeholder="example@email.com" name="email">
                                </div>
                                <div class="col-md-6 form-group">
                            <label>Phone Number</label>
                            <input class="form-control" type="number" placeholder="01638574281" name="mobile">
                        </div>
                            @endif
                                <div class="col-md-12 form-group">
                                    <label>Deliver Address</label>
                                    <input class="form-control" name="delivery_address" type="text" placeholder="Gulshan, Dhaka">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Select Payment Method</label>
                                    <br>
                                    <label ><input type="radio" value="1"  name="payment_method"/> Online</label>
                                    <label><input type="radio" value="2" checked name="payment_method"/> Cash On Delivery</label>
                                </div>
                                <div class="col-md-12 form-group">
                            <input type="submit" class="btn btn-success w-100" value="Checkout">
                        </div>

                    </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Order Total</h4>
                    </div>
                    <div class="card-body">

                        <h5 class="font-weight-medium mb-3">Products</h5>

                        @php($subTotal = 0)
                        @foreach($cartProducts as $cartProduct)
                        <div class="d-flex justify-content-between">
                            <p>{{$cartProduct->name}} - ({{$cartProduct->quantity}})</p>
                            <p>Tk. {{number_format($cartProduct->quantity * $cartProduct->price)}}</p>
                        </div>
                            @php($subTotal += $cartProduct->quantity * $cartProduct->price)
                        @endforeach
                        <hr class="mt-0">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Tk. {{number_format($subTotal)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Tax Total</h6>
                            @php($taxTotal = ($subTotal * 15) / 100)
                            <h6 class="font-weight-medium">Tk. {{number_format($taxTotal)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between pt-1">
                            <h6 class="font-weight-medium">Shipping Cost</h6>
                            <h6 class="font-weight-medium">Tk. {{$subTotal > 0 ? $shipping = 150 : $shipping = 0 }}</h6>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total Payable</h5>
                            @php($total = $subTotal + $taxTotal + $shipping)
                            <h5 class="font-weight-bold">Tk. {{number_format($total)}}</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout End -->
@endsection
