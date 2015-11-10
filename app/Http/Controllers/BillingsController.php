<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\CheckoutRequest;
use App\Jobs\UserPayTheBooking;
use App\ShoppingCart\ShoppingCart;
use Illuminate\Http\Request;

class BillingsController extends Controller
{

	protected $cart;

	public function __construct(ShoppingCart $cart) {

		$this->cart = $cart;
	}


    public function checkout() {

        $cart =  $this->cart->content();

    	return view('public.billing.checkout', compact('cart'));
    }

    public function onCheckout(CheckoutRequest $request) {

        $this->dispatchFrom(UserPayTheBooking::class, $request);

        flash()->overlay('Yay!', 'You have successfully booked the Package. Please check your email.');

        return redirect()->route('checkout.success');
    }

    public function checkoutSuccess() {

        return view('public.billing.checkout-success');
    
    }


}
