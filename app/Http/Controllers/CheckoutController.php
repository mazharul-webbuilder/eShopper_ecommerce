<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Cart;
use Session;

class CheckoutController extends Controller
{
    private $cartProducts;
    private $customer;
    private $order;
    private $orderDetail;

    public function index()
    {
        $this->cartProducts = Cart::getContent();
        return view('front.cart.checkout', ['cartProducts' => $this->cartProducts]);
    }

    public function newOrder(Request $request)
    {
       if (!Session::get('customerId'))
       {
           $this->customer = Customer::getNewCustomer($request);
           Session::put('customerId' , $this->customer->id);
           Session::put('customerName' , $this->customer->name);
       }



        $this->order = Order::getNewOrder($request, Session::get('customerId'));
        OrderDetail::getOrderDetail($request, $this->order->id);


        return redirect('/cart-products')->with('message', 'Your Order Is Places Successfully! We will contact you  soon!');

    }

}
