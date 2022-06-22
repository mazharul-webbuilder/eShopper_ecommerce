@extends('master.front.master')
@section('title')
    Cart Products
@endsection
@section('body')
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shopping Cart</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="{{route('home')}}">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
                <br>
                <h3 class="text-center text-success">{{Session::get('message')}}</h3>

            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach($cartProducts as $cartProduct)
                    <tr>
                        <td class="text-left"><img src="{{asset($cartProduct->attributes->image)}}" alt="" style="width: 50px;"> {{$cartProduct->name}}</td>
                        <td class="text-left">Tk. {{number_format($cartProduct->price)}}</td>
                        <td class="align-middle">
                            <form action="{{route('update-cart-product', ['id' => $cartProduct->id])}}" method="post">
                                @csrf
                                <div class="input-group quantity mx-auto" style="width: 80%">
                                    <input type="text" class="form-control form-control-sm bg-secondary text-center" min="1" name="qty" value="{{$cartProduct->quantity}}">
                                    <div class="input-group-btn">
                                        <input type="submit" class="btn btn-sm btn-success" value="update">
                                    </div>
                                </div>
                            </form>
                        </td>
                        <td class="text-left">Tk. {{number_format($cartProduct->quantity * $cartProduct->price)}}</td>
                        <td class="align-middle"><a href="" onclick="event.preventDefault(); confirm('Are You Sure To Delete This?') ? document.getElementById('cartProductRemove{{$cartProduct->id}}').submit() : ''; " class="btn btn-sm btn-primary"><i class="fa fa-times"></i></a></td>
                        <form action="{{route('delete-cart-product', ['id' => $cartProduct->id])}}" method="post" id="cartProductRemove{{$cartProduct->id}}">
                            @csrf
                        </form>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">

                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Cart Summary</h4>
                    </div>
                    <div class="card-body">
                        @php($subTotal = 0)
                        @foreach($cartProducts as $cartProduct)
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">{{$cartProduct->name}} </h6>
                            <h6 class="font-weight-medium">Tk. {{number_format($cartProduct->quantity * $cartProduct->price)}}</h6>
                        </div>
                            @php($subTotal += ($cartProduct->quantity * $cartProduct->price) )
                        @endforeach
                        <hr>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Subtotal</h6>
                            <h6 class="font-weight-medium">Tk. {{number_format($subTotal)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tax Total - 15%</h6>
                            @php($taxTotal = ($subTotal * 15) / 100)
                            <h6 class="font-weight-medium">Tk. {{number_format($taxTotal)}}</h6>
                        </div>
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Shipping Cost</h6>
                            @php($shipping = 0)
                            <h6 class="font-weight-medium">Tk. {{$subTotal > 0 ? $shipping = 150 : $shipping = 0}}</h6>
                        </div>

                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Total Payable</h5>
                            @php($totalPayable = $subTotal + $taxTotal + $shipping)
                            <h5 class="font-weight-bold">Tk. {{number_format($totalPayable)}}</h5>
                        </div>
                        @php(Session::put('orderTotal', $totalPayable))
                        @php(Session::put('taxAmount', $taxTotal))
                        @php(Session::put('shipping', $shipping))
                        <a href="{{route('checkout')}}" class="btn btn-block btn-primary my-3 py-3">Confirm Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->
@endsection
