<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    private $customer;

    public function register()
    {
        return view('front.customer.register');
    }

    public function newRegister(Request $request)
    {
        Customer::getNewRegisterdCustomer($request);
        return redirect('/customer-dashboard');

    }

    public function login()
    {
        return view('front.customer.login');
    }

    public function loginCheck(Request $request)
    {
        $this->customer = Customer::where('email', $request->email)->first();

        if ($this->customer)
        {
            if (password_verify($request->password, $this->customer->password))
            {
                Session::put('customerId' , $this->customer->id);
                Session::put('customerName' , $this->customer->name);

                return  redirect('/customer-dashboard');
            }
            else
            {
                return redirect('/customer-login')->with('message2', 'Password Is Invalid');
            }
        }
        else
        {
            return redirect('/customer-login')->with('message', 'Email Is Invalid');
        }
    }

    public function dashboard()
    {

        return view('front.customer.dashboard', [
            'orders' => Order::where('customer_id', Session::get('customerId'))->get()
        ]);
    }

    public function logout()
    {
        Session::forget('customerId');
        Session::forget('customerName');

        return redirect('/');

    }
}
