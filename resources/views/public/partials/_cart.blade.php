
@inject('cart', 'App\ShoppingCart\ShoppingCart')

<div class="cart">
	<table class="striped bordered">
		<thead>
			<tr>
				<th>Package</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Subtotal</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach( $cart->content() as $item )
			<tr>
				<td width="550">
					<div class="row">
						<div class="col m2">
							{!! display($item->options->package->photos, 'materialboxed img-rounded', 100) !!}
						</div>

						<div class="col m9">
							<div class="cart__package">
								<h4 class="cart__package__title">
									<a href="{{ route('package', $item->options->package->slug) }}">
										{{ $item->name }}
									</a>
								</h4>

								<p class="text-muted">
									<i class="fa fa-calendar"></i> 
									{{ $item->options->date }}
								</p>

		 						@if( $item->options->child_quantity > 0)

		 							<ul class="collection">
		 								<li class="collection-item">
		 									<strong>Child:</strong>
		 									{{ $item->options->child_quantity }} &times; 
		 									{!! convertedAmountWithCurrency($item->options->package->child_price) !!}
		 								</li>
		 							</ul>
								@endif

							</div>
						</div>
					</div>
				</td>

				<td class="nowrap">{!! convertedAmountWithCurrency($item->price) !!}</td>
				
				<td class="nowrap">{{ $item->qty }} </td>
				
				<td class="nowrap">{!! convertedAmountWithCurrency($item->subtotal) !!}</td>

				<td>
					@if( $editable )
						@include('public.cart.edit')
					@endif
				</td>
			</tr>
			@endforeach

		</tbody>	
	</table>

	<p>&nbsp;</p>
	
	<h5 class="right">Total: {!! convertedAmountWithCurrency($cart->total()) !!}</h5>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
	<p>&nbsp;</p>

	<div class="row">
		<div class="col s6 m3">
			<p class="center-content">
				<a href="{{ route('packages') }}" class="btn-flat center-content">
					<i class="fa fa-plus"></i> Add more Package
				</a>
			</p>
		</div>

		<div class="col s6 m3 offset-m6">
			@if( $editable )	
				<p class="center-content">
					<a href="{{ route('checkout') }}" class="btn btn-large waves-effect waves-light green full-width">
						Checkout
					</a>
				</p>
			@endif
		</div>
	</div>


</div>


