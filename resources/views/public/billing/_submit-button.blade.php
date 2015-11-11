<div class="alert alert-danger payment-errors"></div>

<div class="place-order-button">
	<button type="submit" name="submitPayment" class="btn btn-large waves-effect waves-light">
		<i class="fa fa-lock"></i> &nbsp; Pay {!! convertedAmountWithCurrency($cart->total()) !!}
	</button>
</div>

@include('spinner')	