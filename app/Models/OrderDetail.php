<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Session;
use Cart;

class OrderDetail extends Model
{
    use HasFactory;

    private static $orderDetail;
    private static $cartProduct;

    public static function getOrderDetail($request, $orderId)
    {
        self::$cartProduct = Cart::getContent();

        foreach (self::$cartProduct as $cartProduct)
        {
            self::$orderDetail                   = new OrderDetail();
            self::$orderDetail->order_id         = $orderId;
            self::$orderDetail->product_id       = $cartProduct->id;
            self::$orderDetail->product_name     = $cartProduct->name;
            self::$orderDetail->product_price    = $cartProduct->price;
            self::$orderDetail->product_quantity = $cartProduct->quantity;
            self::$orderDetail->save();
        }

        foreach (self::$cartProduct as $cartProduct)
        {
            Cart::remove($cartProduct->id);
        }

    }
}
