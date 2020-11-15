<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Session;

class StripeController extends Controller
{
    //

    public function handleGet()
    {
        # code...
        return view('FrontEnd.checkout.stripe');
    }
    public function handlePost(Request $request)
    {
        # code...
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create([
            "amount"=>round($request->input('grandTotal')*100),
            "currency"=>"usd",
            "source"=>$request->stripeToken,
            "description"=>$request->name

        ]);
        Session::flash('success', 'Payment has been succesfully processed');
        return redirect('order-complete');
    }
}