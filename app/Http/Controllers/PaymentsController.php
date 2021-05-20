<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PaymentsController extends Controller
{
    //


    public function stripe(Request $request) {





        \Stripe\Stripe::setApiKey ( 'sk_test_51IMTL2E3aOKhVh4WyoVGpRVN2KkGbwKf3HiLl3FnbGaFYNy0sxpNRDyQxYXBfE6DWUOMsk4KoMg5TPrP6t61A8uY00m8QWvsR0' );
        try {
//        $booking = new user_booking();
//        $booking->save();

        \Stripe\Charge::create(array(
            "amount" => 300 * 100,
            "currency" => "usd",
            "source" => $request->input('stripeToken'), // obtained with Stripe.js
            "description" => "Test payment."
        ));

        Session::flash ( 'succesmsg', 'Payment done successfully !' );
        return Redirect::back ();
        } catch ( \Exception $e ) {
            Session::flash ( 'errormsg', "Error! Please Try again." );
            return Redirect::back ();
        }
    }
}
