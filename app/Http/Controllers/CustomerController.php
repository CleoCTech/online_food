<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Shipping;
use Illuminate\Http\Request;
use Session;
class CustomerController extends Controller
{
    //

    public function login(){
        return view('FrontEnd.customer.login');
    }
    public function logout(){

        Session::forget('customer_id');
        Session::forget('customer_name');

        return redirect('/');
    }
    public function check(Request $request){

        $customer =Customer::where('email', $request->email)->first();
        if (password_verify($request->password, $customer->password)) {
            # code...
            Session::put('customer_id', $customer->customer_id);
            Session::put('customer_name', $customer->name);

            return redirect('/shipping');
        } else {
            # code...
            return redirect('/customer-login')->with('sms', 'Your Password Is Incorrect');
        }


        return view('FrontEnd.customer.login');
    }
    public function show()
    {
        return view('FrontEnd.customer.register');
    }
    public function shipping()
    {
        $customer =Customer::find(Session::get('customer_id'));

        return view('FrontEnd.checkout.shipping', compact('customer'));
    }

    public function store(Request $request)
    {
        $customer =new Customer();
        $customer->name= $request->username;
        $customer->email= $request->email;
        $customer->phone_no= $request->phone_no;
       // $customer->password=Hash::make($request->password);
       $customer->password=bcrypt($request->password);

        $customer->save();

        $customer_id = $customer->customer_id;
        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $customer->name);
        // Session::put('customer_phone', $customer->phone_no);


        return redirect('/shipping');
    }

    public function save(Request $request)
    {
        # code...
        $shipping = new Shipping();
        $shipping->name= $request->username;
        $shipping->email= $request->email;
        $shipping->phone_no= $request->phone_no;
        $shipping->address= $request->address;

        $shipping->save();

        Session::put('shipping_id', $shipping->id);
        Session::put('customer_name', $shipping->name);

        return redirect()->route('checkout-payment');
    }
}
