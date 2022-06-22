<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;

class Order extends Model
{
    use HasFactory;
    private static $order;
    private static $cartProduct;

    public static  function getNewOrder($request, $customerId)
    {
        self::$cartProduct = Cart::getContent();

        self::$order                    = new Order();
        self::$order->customer_id       = $customerId;
        self::$order->order_total       = Session::get('orderTotal');
        self::$order->tax_amount        = Session::get('taxAmount');
        self::$order->shipping_amount   = Session::get('shipping');
        self::$order->delivery_address  = $request->delivery_address;
        self::$order->order_date  = date('Y-m-d');
        self::$order->order_timestamp   = strtotime(date('Y-m-d'));
        self::$order->payment_type      = $request->payment_method;
        self::$order->save();
        return self::$order;
    }

    public static function updateOrder($request, $id)
    {
        self::$order = Order::find($id);
        self::$order->delivery_address = $request->delivery_address;
        self::$order->order_status = $request->order_status;
        self::$order->order_status = $request->order_status;
        self::$order->payment_amount = $request->payment_amount;
        self::$order->payment_status = $request->payment_status;
        self::$order->save();
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }




    public function orderDetails()
    {
        return $this->hasMany('App\Models\OrderDetail');
    }
}
