<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Invoice</title>
    <link rel="icon" href="{{asset('/')}}asset/front/favicon/favicon.svg">
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            .logospan
            {
                color: red;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
<div class="invoice-box">
    <table cellpadding="0" cellspacing="0">
        <tr class="top">
            <td colspan="4">
                <table>
                    <tr>
                        <td class="">
                            <h3 style="font-size: 35px;"><span style="color: #ffaeae; font-size: 50px; padding: 5px 10px; border: 1px solid wheat;">E</span>Shopper</h3>
                        </td>
                        <td>
                            <h4 style="padding-bottom: 0; margin-bottom: 0;">Order Date: {{$order->order_date}}</h4>
                            <h4 style="padding-top: 0; margin-top: 0;">Invoice Date: {{date('Y-m-d')}}</h4>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="information">
            <td colspan="4">
                <table>
                    <tr>
                        <td>
                            <h4 style="padding: 0; margin: 0;">Billing Info</h4>  <br>

                            {{$order->customer->name}}<br />
                            {{$order->customer->address}}<br />
                            {{$order->customer->mobile}}
                        </td>

                        <td>
                            <h4 style="padding: 0; margin: 0;">Customer Info</h4> <br>
                            {{$order->customer->name}}<br />
                            {{$order->customer->email}}<br />
                            {{$order->customer->mobile}}

                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr class="heading">
            <td colspan="2">Payment Method</td>

            <td colspan="2">Total Payable</td>
        </tr>

        <tr class="details">
            <td colspan="2">Cash On Delivery</td>

            <td colspan="2">Tk. {{number_format($order->order_total)}}</td>
        </tr>

        <tr class="heading">
            <td>Item</td>
            <td style="text-align: center">Quantity</td>
            <td>Unit Price</td>
            <td align="right">Total Price</td>
        </tr>

        @php($total = 0)
        @foreach($order->orderDetails as $orderDetail)
            <tr class="item">
                <td >{{$orderDetail->product_name}}</td>
                <td style="text-align: center">{{$orderDetail->product_quantity}}</td>
                <td>Tk. {{number_format($orderDetail->product_price * $orderDetail->product_quantity)}}</td>

                <td align="right">Tk. {{number_format($orderDetail->product_price * $orderDetail->product_quantity)}}</td>
            </tr>
            @php($total += $orderDetail->product_price * $orderDetail->product_quantity)
        @endforeach
        @php($tax = $total * 15 / 100)



        <tr class="total">
            <td colspan="4" align="right">Sub Total: Tk {{number_format($total)}}</td>
        </tr>
        <tr class="total">
            <td colspan="4" align="right">Tax Total (15%): Tk {{number_format($tax)}}</td>
        </tr>
        <tr class="total">
            <td colspan="4" align="right">Shipping Cost: Tk {{number_format(150)}}</td>
        </tr>
        <tr class="total">
            <td colspan="4" align="right">Total Payable: Tk {{number_format($total + $tax + 150)}}</td>
        </tr>
    </table>
</div>
<script src="{{asset('/')}}asset/front/mail/jqBootstrapValidation.min.js"></script>
</body>
</html>
