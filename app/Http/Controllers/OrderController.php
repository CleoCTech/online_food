<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\Customer;
use App\OrderDetail;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function manageOrder()
    {
        # code...

        $orders = DB::table('orders')
                    ->join('customers', 'orders.customer_id', '=', 'customers.customer_id' )
                    ->join('payments', 'orders.order_id', '=', 'payments.order_id' )
                    ->select('orders.*', 'customers.name', 'payments.payment_type', 'payments.payment_status')
                    ->get();

                 //   dd($orders);
        return view('BackEnd.Order.manage' , compact('orders'));
    }

    public function viewOrder($order_id)
    {
        # code...
        $order =Order::find($order_id);
        $customer =Customer::find($order['customer_id']);
       // $customer =Customer::find($order->customer_id)->first();
        $shipping =Shipping::find($order['shipping_id']);
        $payment =Payment::where('order_id', $order['order_id'])->first();
        $order_detail =OrderDetail::where('order_id', $order['order_id'])->first();

        return view('BackEnd.Order.view_order', compact('order', 'customer', 'shipping', 'payment', 'order_detail'));
    }
}
