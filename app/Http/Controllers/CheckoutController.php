<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Payment;
use Session;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    //

    public function check()
    {


        return view('FrontEnd.checkout.check');
    }
    public function payment ()
    {

       // dd(Session::get('customer_id'));
        return view('FrontEnd.checkout.checkout_payment');
    }

    public function order (Request $request)
    {

        $paymentType = $request->payment_type;

        if ($paymentType == 'Cash') {
            # code...
            $order = new Order();
            $order->customer_id =Session::get('customer_id');
            $order->shipping_id =Session::get('shipping_id');
            $order->order_total =Session::get('sum');
            $order->save();

           // dd($order->order_id);
            $order_id =$order->order_id;

            $payment =new Payment();
            $payment->order_id= $order_id;
            $payment->payment_type= $paymentType;
            $payment->save();

            $CartDish =Cart::content();

            foreach ($CartDish as $cart) {
                # code...
                $orderDeatail = new OrderDetail();
                $orderDeatail->order_id =$order->order_id;
                $orderDeatail->dish_id =$cart->id;
                $orderDeatail->dish_name =$cart->name;
                if ($cart->half_price ==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                } elseif($cart->half_price !==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                    $orderDeatail->dish_price =$cart->half_price;
                }

                $orderDeatail->dish_qty =$cart->qty;
                $orderDeatail->save();
            }

            Cart::destroy();
           // dd('Success');
           Session::flash('success', 'Payment has been succesfully processed');
            return redirect('order-complete');

        } elseif($paymentType == 'Stripe') {
            # code...
            $order = new Order();
            $order->customer_id =Session::get('customer_id');
            $order->shipping_id =Session::get('shipping_id');
            $order->order_total =Session::get('sum');
            $order->save();

           // dd($order->order_id);
            $order_id =$order->order_id;

            $payment =new Payment();
            $payment->order_id= $order_id;
            $payment->payment_type= $paymentType;
            $payment->save();

            $CartDish =Cart::content();

            foreach ($CartDish as $cart) {
                # code...
                $orderDeatail = new OrderDetail();
                $orderDeatail->order_id =$order->order_id;
                $orderDeatail->dish_id =$cart->id;
                $orderDeatail->dish_name =$cart->name;
                if ($cart->half_price ==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                } elseif($cart->half_price !==null) {
                    # code...
                    $orderDeatail->dish_price =$cart->price;
                    $orderDeatail->dish_price =$cart->half_price;
                }

                $orderDeatail->dish_qty =$cart->qty;
                $orderDeatail->save();
            }

            Cart::destroy();



            return redirect('stripe');
            //dd("success");

        }

        return $request;
    }

    public function stripe()
    {

        return view('FrontEnd.checkout.stripe');
    }

    public function  complete()
    {

        return view('FrontEnd.checkout.order_complete');
    }
}