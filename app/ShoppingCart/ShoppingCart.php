<?php

namespace App\ShoppingCart;

use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCart {

	public function add(array $content) {

		return Cart::add($content);
	}
	

	public function content() {

		return Cart::content();

	}
	
	public function total() {

		return Cart::total();

	}

	public function count() {

		return Cart::count(false);
	}

	public function update($rowId, $quantity) {

		return Cart::update($rowId, $quantity);
	}

	/**
	 * Remove item from the cart
	 */
	public function remove($rowId) {

		Cart::remove($rowId);

	}

	/**
	 * Empty the Cart
	 */
	public function destroy() {

		Cart::destroy();

	}


}