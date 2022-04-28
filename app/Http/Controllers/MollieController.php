<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Mollie\Laravel\Facades\Mollie;

class MollieController extends Controller
{

    /**
     * Redirect the user to the Payment Gateway.
     *
     * @return
     */
    public function preparePayment()
    {

        $total = number_format(Session::get('cart')->totalPrice * 1.21,2,'.','');

        
        $payment = Mollie::api()->payments()->create([
            'amount' => [
                'currency' => 'EUR', // Type of currency you want to send
                'value' => "$total", // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            'description' => 'Payment By codehunger',
            'redirectUrl' => route('payment.success'), // after the payment completion where you to redirect
        ]);

        $payment = Mollie::api()->payments()->get($payment->id);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    /**
     * Page redirection after the successfull payment
     *
     * @return
     */
    public function paymentSuccess() {
        echo 'payment has been received';

    }
}
