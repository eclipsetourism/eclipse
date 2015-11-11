<div class="orders card-panel">

	<h5 class="mb-35">Your Orders</h5>
	
	@foreach( $cart->content() as $item )
		<div class="order">
			<div class="order__image">
				<a href="{{ route('package', $item->options->package->slug) }}">
					{!! display($item->options->package->photos, 'img-rounded', 70) !!}
				</a>
			</div>

			<div class="order__body">
				<h5 class="order__title">{{ $item->name }}</h5>
				<h6 class="order__price">{!! convertedAmountWithCurrency($item->price) !!}</h6>
				<p>
					<strong>Adult:</strong> {{ $item->qty }}<br />
					<strong>Child:</strong> 
					{{ $item->options->child_quantity }} &times; {!! convertedAmountWithCurrency($item->options->child_price) !!}
				</p>
			</div>
		</div>
	@endforeach

	<hr />

	<h5 class="orders__total">Total: {!! convertedAmountWithCurrency($cart->total()) !!}</h5>

</div>	

<div class="currency card-panel">

	<h5>Select Currency</h5>

	<form method="POST" action="{{ route('change-currency') }}" class="form-inline">
		{!! csrf_field() !!}

		<div class="form-group">
			<div class="bfh-selectbox bfh-currencies" data-currency="{{ currentCurrency() }}" data-flags="true">
				<input type="hidden" name="currency" class="form-control" value="">
				<a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
					<span class="bfh-selectbox-option input-medium" data-option=""></span>
					<b class="caret"></b>
				</a>
				<div class="bfh-selectbox-options">
					<input type="text" class="bfh-selectbox-filter form-control">
					<div role="listbox">
						<ul role="option">
						
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-sm waves-effect waves-light">Change</button>
		</div>
	</form>

</div>

<div class="currency card-panel">
	<h5>Need Help?</h5>
	<p>
		Call our customer services team on the number below to speak to one of our advisors who will help you with all of your booking needs.
	</p>
	&nbsp;
	<p class="center-content"><i class="material-icons">phone</i> +971 4 453 4375</p>

</div>