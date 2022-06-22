<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CancelOrder extends Model
{
    use HasFactory;

    private static $order;
    private static $orderDetail;
    private static $cancelOrder;
    private static $productInfo;


    public static function deleteOrder($request, $id)
    {
        self::$productInfo = '';

        self::$order = Order::find($id);
        self::$orderDetail = OrderDetail::where('order_id', $id)->get();
        foreach (self::$orderDetail as $orderDetail)
        {
            self::$productInfo .=  '(' . $orderDetail->product_name . ',' . $orderDetail->product_quantity . ',' . $orderDetail->product_price . ')';
        }

        self::$cancelOrder                    = new CancelOrder();
        self::$cancelOrder->order_id          = self::$order->id;
        self::$cancelOrder->order_total       = self::$order->order_total;
        self::$cancelOrder->tax_total         = self::$order->tax_amount;
        self::$cancelOrder->shipping_total    = self::$order->shipping_amount;
        self::$cancelOrder->order_date        = self::$order->order_date;
        self::$cancelOrder->cancel_date       = date('Y-m-d');
        self::$cancelOrder->payment_type      = self::$order->payment_type;
        self::$cancelOrder->product_info      = self::$productInfo;
        self::$cancelOrder->save();

        self::$order->delete();
        foreach (self::$orderDetail as $orderDetail)
        {
            $orderDetail->delete();
        }

    }
}
