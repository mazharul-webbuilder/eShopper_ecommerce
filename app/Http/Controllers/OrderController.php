<?php

namespace App\Http\Controllers;
use App\Models\CancelOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use PDF;

class OrderController extends Controller
{
    private $orders;
    private $order;

    public function edit($id)
    {
        return view('admin.order.edit',[
            'order' => Order::find($id)
        ]);
    }

    public function update(Request $request, $id)
    {
       Order::updateOrder($request, $id);
       return redirect('/manage-order')->with('message', 'Order Updated Successfully');
    }

    public function delete(Request $request, $id)
    {
        CancelOrder::deleteOrder($request, $id);
        return redirect('/manage-order')->with('message', 'Deleted Successfully, You Can Found Deleted Orders On Cancel Orders Table');
    }


    public function mange()
    {
        $this->orders = Order::orderby('id', 'asc')->get();

        return view('admin.order.manage',[
            'orders' => $this->orders
        ]);
    }

    public function detail($id)
    {
        return view('admin.order.detail',[
            'order' => Order::find($id),
        ]);
    }

    public function invoice($id)
    {

        return view('admin.order.invoice',[
            'order' => Order::find($id)
        ]);
    }

    public function printInvoice($id)
    {

        $pdf = PDF::loadView('admin.order.print', ['order' => Order::find($id)]);
        return $pdf->download('invoice' .$id. '.pdf');

    }
}
